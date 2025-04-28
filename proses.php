<?php
include 'koneksi.php';

// Ambil kategori dari database
$kategori = [];
$qKategori = mysqli_query($koneksi, "SELECT * FROM kategori");
while ($row = mysqli_fetch_assoc($qKategori)) {
    $kategori[] = $row;
}

// Proses form submit
$rekomendasi = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kategori_disukai = isset($_POST['kategori']) ? $_POST['kategori'] : [];

    // Simpan user baru
    mysqli_query($koneksi, "INSERT INTO users (nama) VALUES ('$nama')");
    $user_id_baru = mysqli_insert_id($koneksi);

    // Simpan kategori yang disukai
    foreach ($kategori_disukai as $id_kategori) {
        mysqli_query($koneksi, "INSERT INTO user_kategori (user_id, kategori_id) VALUES ($user_id_baru, $id_kategori)");
    }

    // Ambil semua user
    $users = [];
    $qUsers = mysqli_query($koneksi, "SELECT * FROM users");
    while ($row = mysqli_fetch_assoc($qUsers)) {
        $users[$row['id']] = [
            'nama' => $row['nama'],
            'kategori' => []
        ];
    }

    // Ambil semua user_kategori
    $qUserKategori = mysqli_query($koneksi, "SELECT * FROM user_kategori");
    while ($row = mysqli_fetch_assoc($qUserKategori)) {
        $users[$row['user_id']]['kategori'][] = $row['kategori_id'];
    }

    // Hitung kemiripan (Cosine Similarity sederhana)
    $kemiripan_tertinggi = 0;
    $user_mirip_id = 0;

    foreach ($users as $id => $data) {
        if ($id == $user_id_baru) continue; // Jangan dibandingkan dengan diri sendiri

        $kategori_lama = $data['kategori'];
        $kategori_baru = $users[$user_id_baru]['kategori'];

        $dot = count(array_intersect($kategori_lama, $kategori_baru));
        $norma_lama = sqrt(count($kategori_lama));
        $norma_baru = sqrt(count($kategori_baru));

        if ($norma_lama != 0 && $norma_baru != 0) {
            $similarity = $dot / ($norma_lama * $norma_baru);
            if ($similarity > $kemiripan_tertinggi) {
                $kemiripan_tertinggi = $similarity;
                $user_mirip_id = $id;
            }
        }
    }

    // Cari kategori yang belum dipilih user baru tapi dipilih user mirip
    if ($user_mirip_id != 0) {
        $kategori_mirip = $users[$user_mirip_id]['kategori'];
        foreach ($kategori_mirip as $p) {
            if (!in_array($p, $users[$user_id_baru]['kategori'])) {
                $qNamaKategori = mysqli_query($koneksi, "SELECT nama_kategori FROM kategori WHERE id=$p");
                $hasil = mysqli_fetch_assoc($qNamaKategori);
                $rekomendasi[] = $hasil['nama_kategori'];
            }
        }
    }
}
