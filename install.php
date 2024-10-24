<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "language";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Membuat database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$conn->query($sql);

// Menggunakan database
$conn->select_db($dbname);

// Membuat tabel Pengguna
$sql = "CREATE TABLE IF NOT EXISTS Pengguna (
    ID_Pengguna INT(11) AUTO_INCREMENT PRIMARY KEY,
    Nama VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL
)";
$conn->query($sql);

// Membuat tabel KosaKata
$sql = "CREATE TABLE IF NOT EXISTS KosaKata (
    ID_KosaKata INT(11) AUTO_INCREMENT PRIMARY KEY,
    indonesia VARCHAR(255) NOT NULL,
    arab VARCHAR(255) NOT NULL,
    inggris Varchar(255) NOT NULL
)";
$conn->query($sql);

// Membuat tabel Latihan
$sql = "CREATE TABLE IF NOT EXISTS Latihan (
    ID_Latihan INT(11) AUTO_INCREMENT PRIMARY KEY,
    ID_KosaKata INT(11) NOT NULL,
    Pertanyaan VARCHAR(255) NOT NULL,
    Jawaban VARCHAR(255) NOT NULL,
    FOREIGN KEY (ID_KosaKata) REFERENCES KosaKata(ID_KosaKata)
)";
$conn->query($sql);

// Membuat tabel Hasil_Kuis
$sql = "CREATE TABLE IF NOT EXISTS Hasil_Kuis (
    ID_Hasil INT(11) AUTO_INCREMENT PRIMARY KEY,
    ID_Pengguna INT(11) NOT NULL,
    Skor INT(11) NOT NULL,
    Tanggal DATE NOT NULL,
    FOREIGN KEY (ID_Pengguna) REFERENCES Pengguna(ID_Pengguna)
)";
$conn->query($sql);

echo "Database dan tabel berhasil dibuat.";

$conn->close();
?>
