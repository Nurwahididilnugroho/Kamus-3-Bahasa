<?php
session_start();
include 'db.php';

if (!isset($_SESSION['ID_Pengguna'])) {
    header("Location: login.php");
    exit();
}

$id_kosakata = $_GET['id'];

$sql = "DELETE FROM KosaKata WHERE ID_KosaKata='$id_kosakata'";

if ($conn->query($sql) === TRUE) {
    echo "Kosakata berhasil dihapus. <a href='kamus.php'>Kembali ke Kamus</a>";
} else {
    echo "Error: " . $conn->error;
}
?>
