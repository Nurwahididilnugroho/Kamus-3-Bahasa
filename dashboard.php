<?php
session_start();
include 'db.php';

if (!isset($_SESSION['ID_Pengguna'])) {
    header("Location: login.php");
    exit();
}

echo "<h1>Selamat datang!</h1>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
    padding:90px;
}

h1 {
    color: #333;
    font-size: 36px;
    margin-bottom: 20px;
    text-align: center;
}

a {
    display: inline-block;
    text-decoration: none;
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    margin: 10px 0;
    text-align: center;
    transition: background-color 0.3s ease;
    align-content:center;
    margin-left:10px;
}

a:hover {
    background-color: #0056b3;
}

.container {
    max-width: 600px; /* Maksimal lebar kontainer */
    margin: 0 auto; /* Memusatkan kontainer */
    text-align: center; /* Memusatkan teks di dalam kontainer */
    align-items:center;
    justify-content:center;
    display:block;
}

footer {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
}

div {
    background: #024CAA;
    align-items: stretch;
    justify-content:center;
    border-radius:20px;
    height: 300px;
    padding-top:50px;
}
    </style>
</head>
<body>
    <div class="container">
    <a href="quiz.php">Mulai Latihan Kuis</a><br>
    <a href="logout.php">Logout</a> <br>
    <a href="kamus.php">Lihat Kamus</a> <br>
    </div>
</body>
</html>

