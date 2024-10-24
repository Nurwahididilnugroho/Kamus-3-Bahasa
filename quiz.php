<?php
session_start();
include 'db.php';

if (!isset($_SESSION['ID_Pengguna'])) {
    header("Location: login.php");
    exit();
}

// Mengambil kata secara acak dari database
$sql = "SELECT * FROM KosaKata ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jawaban = $_POST['jawaban'];
    $idKosaKata = $_POST['id_kosakata'];

    $sql = "SELECT * FROM KosaKata WHERE ID_KosaKata='$idKosaKata'";
    $result = $conn->query($sql);
    $kata = $result->fetch_assoc();

    if (strtolower($jawaban) == strtolower($kata['arab'])) {
        echo "Jawaban benar!";
    } else {
        echo "Jawaban salah. Kata yang benar adalah: " . $kata['arab'];
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <style>
        /* Reset default styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #e9ecef;
    padding: 20px;
}

h1 {
    color: #333;
    font-size: 36px;
    margin-bottom: 20px;
    text-align: center;
}

form {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin: 20px auto;
}

p {
    margin-bottom: 15px;
    font-size: 18px;
    color: #333;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ced4da;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #218838;
}

a {
    text-decoration: none;
    color: #007bff;
    display: inline-block;
    margin-top: 20px;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <form method="post">
    <input type="hidden" name="id_kosakata" value="<?php echo $row['ID_KosaKata']; ?>">
    <p>Terjemahkan kata ini kedalam bahasa arab: <strong><?php echo $row['indonesia']; ?></strong></p>
    Jawaban: <input type="text" name="jawaban" required>
    <input type="submit" value="Kirim Jawaban">
    <br><br>
    <a href="dashboard.php">Kembali ke Dashboard</a>

</form>
</body>
</html>