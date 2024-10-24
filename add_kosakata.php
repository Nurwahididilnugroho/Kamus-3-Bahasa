<?php
session_start();
include 'db.php';

if (!isset($_SESSION['ID_Pengguna'])) {
    header("Location: login.php");
    exit();
}

// Memastikan hanya admin yang bisa menambah kosakata
if ($_SESSION['ID_Pengguna'] != 1) {
    echo "Anda tidak memiliki izin untuk mengakses halaman ini.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $indonesia = $_POST['indonesia'];
    $arab = $_POST['arab'];
    $inggris = $_POST['inggris']; // Pastikan ini sama dengan name input

    $sql = "INSERT INTO KosaKata (indonesia, arab, inggris) VALUES ('$indonesia', '$arab', '$inggris')";

    if ($conn->query($sql) === TRUE) {
        echo "Kosakata berhasil ditambahkan. <a href='kamus.php'>Lihat Kamus</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kosa-kata</title>
    <style>
        /* Reset default styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    padding: 20px;
}

h1 {
    color: #333;
    font-size: 36px;
    margin-bottom: 30px;
    text-align: center;
}

form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
    margin: 0 auto; /* Centering the form */
}

form input[type="text"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ced4da;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

form input[type="text"]:focus {
    border-color: #007bff;
    outline: none;
}

form input[type="submit"] {
    width: 100%;
    background-color: #28a745;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
    background-color: #218838;
}

a {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
    text-align: center; /* Center the text */
}

a:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
<h1>Tambah Kosakata Baru</h1>
<form method="post">
    Bahasa Indonesia: <input type="text" name="indonesia" required>
    Bahasa Arab: <input type="text" name="arab" required>
    Bahasa Inggris: <input type="text" name="inggris" required> <!-- Perbaiki di sini -->
    <input type="submit" value="Tambah Kosakata">
<a href="dashboard.php">Kembali ke Dashboard</a>

</form>
</body>
</html>