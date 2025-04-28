<?php
include 'koneksi.php';

// Ambil produk dari database
$produk = [];
$qProduk = mysqli_query($koneksi, "SELECT * FROM produk");
while ($row = mysqli_fetch_assoc($qProduk)) {
    $produk[] = $row;
}

// Proses form submit
$rekomendasi = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $produk_disukai = isset($_POST['produk']) ? $_POST['produk'] : [];

    // Simpan user baru
    mysqli_query($koneksi, "INSERT INTO users (nama) VALUES ('$nama')");
    $user_id_baru = mysqli_insert_id($koneksi);

    // Simpan produk yang disukai
    foreach ($produk_disukai as $id_produk) {
        mysqli_query($koneksi, "INSERT INTO user_produk (user_id, produk_id) VALUES ($user_id_baru, $id_produk)");
    }

    // Ambil semua user
    $users = [];
    $qUsers = mysqli_query($koneksi, "SELECT * FROM users");
    while ($row = mysqli_fetch_assoc($qUsers)) {
        $users[$row['id']] = [
            'nama' => $row['nama'],
            'produk' => []
        ];
    }

    // Ambil semua user_produk
    $qUserProduk = mysqli_query($koneksi, "SELECT * FROM user_produk");
    while ($row = mysqli_fetch_assoc($qUserProduk)) {
        $users[$row['user_id']]['produk'][] = $row['produk_id'];
    }

    // Hitung kemiripan (Cosine Similarity sederhana)
    $kemiripan_tertinggi = 0;
    $user_mirip_id = 0;

    foreach ($users as $id => $data) {
        if ($id == $user_id_baru) continue; // Jangan dibandingkan dengan diri sendiri

        $produk_lama = $data['produk'];
        $produk_baru = $users[$user_id_baru]['produk'];

        $dot = count(array_intersect($produk_lama, $produk_baru));
        $norma_lama = sqrt(count($produk_lama));
        $norma_baru = sqrt(count($produk_baru));

        if ($norma_lama != 0 && $norma_baru != 0) {
            $similarity = $dot / ($norma_lama * $norma_baru);
            if ($similarity > $kemiripan_tertinggi) {
                $kemiripan_tertinggi = $similarity;
                $user_mirip_id = $id;
            }
        }
    }

    // Cari produk yang belum dipilih user baru tapi dipilih user mirip
    if ($user_mirip_id != 0) {
        $produk_mirip = $users[$user_mirip_id]['produk'];
        foreach ($produk_mirip as $p) {
            if (!in_array($p, $users[$user_id_baru]['produk'])) {
                $qNamaProduk = mysqli_query($koneksi, "SELECT nama_produk FROM produk WHERE id=$p");
                $hasil = mysqli_fetch_assoc($qNamaProduk);
                $rekomendasi[] = $hasil['nama_produk'];
            }
        }
    }
}
