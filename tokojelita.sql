CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL
);

CREATE TABLE produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100) NOT NULL
);

CREATE TABLE user_produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    produk_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (produk_id) REFERENCES produk(id)
);

-- Insert produk
INSERT INTO produk (nama_produk) VALUES 
('Hoodie'), ('Kaos'), ('Jaket'), ('Celana'), ('Sepatu');

-- Insert user Joseph Walker
INSERT INTO users (nama) VALUES ('Joseph Walker');

-- Joseph Walker suka Hoodie (id=1) dan Kaos (id=2)
INSERT INTO user_produk (user_id, produk_id) VALUES
(1, 1), (1, 2);
