<?php
session_start();
include 'db.php';

if (!isset($_SESSION['ID_Pengguna'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_kosakata = $_POST['id_kosakata'];
    $indonesia = $_POST['indonesia'];
    $arab = $_POST['arab'];
    $inggris = $_POST['inggris'];

    $sql = "UPDATE KosaKata SET indonesia='$indonesia', arab='$arab', inggris='$inggris' WHERE ID_KosaKata='$id_kosakata'";

    if ($conn->query($sql) === TRUE) {
        echo "Kosakata berhasil diupdate. <a href='kamus.php'>Kembali ke Kamus</a>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    $id_kosakata = $_GET['id'];
    $sql = "SELECT * FROM KosaKata WHERE ID_KosaKata='$id_kosakata'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit kosakata</title>
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
    margin-bottom: 20px;
    text-align: center;
}

form {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin: 0 auto;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #0056b3;
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

.container {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}

footer {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
}

    </style>
</head>
<body>
    <h1>Edit Kosakata</h1>
<form method="post">
    <input type="hidden" name="id_kosakata" value="<?php echo $row['ID_KosaKata']; ?>">
    Bahasa Indonesia: <input type="text" name="indonesia" value="<?php echo $row['indonesia']; ?>" required>
    Bahasa Arab: <input type="text" name="arab" value="<?php echo $row['arab']; ?>" required>
    Bahasa Inggris: <input type="text" name="inggris" value="<?php echo $row['inggris']; ?>" required>
    <input type="submit" value="Update Kosakata">
    <br><br>
    <a href="kamus.php">Kembali ke Kamus</a>

</form>
</body>     
</html>