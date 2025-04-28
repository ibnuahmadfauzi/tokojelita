CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL
);

CREATE TABLE kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(100) NOT NULL
);

CREATE TABLE user_kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    kategori_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (kategori_id) REFERENCES kategori(id)
);

-- Insert kategori
INSERT INTO kategori (nama_kategori) VALUES 
('Hoodie'), ('Kaos'), ('Jaket'), ('Celana'), ('Sepatu');

-- Insert user Joseph Walker
INSERT INTO users (nama) VALUES ('Joseph Walker');

-- Joseph Walker suka Hoodie (id=1) dan Kaos (id=2)
INSERT INTO user_kategori (user_id, kategori_id) VALUES
(1, 1), (1, 2);
