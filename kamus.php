<?php
session_start();
include 'db.php';

if (!isset($_SESSION['ID_Pengguna'])) {
    header("Location: login.php");
    exit();
}

// Mengambil semua kosakata dari database
$sql = "SELECT * FROM KosaKata ORDER BY ID_KosaKata";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamus</title>
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

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

th {
    background-color: #007bff;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

a {
    text-decoration: none;
    color: #007bff;
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
    <h1>Daftar Kosakata</h1>
<table border="1">
    <tr>
        <!-- <th>ID</th> -->
        <th>Indonesia</th>
        <th >Arab</th>
        <th>Inggris</th>
        <th>Aksi</th>
    </tr>
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['indonesia']; ?></td>
                <td><?php echo $row['arab']; ?></td>
                <td><?php echo $row['inggris']; ?></td>
                <td>
                    <a href="edit_kosakata.php?id=<?php echo $row['ID_KosaKata']; ?>">Edit</a> | 
                    <a href="hapus_kosakata.php?id=<?php echo $row['ID_KosaKata']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus kosakata ini?');">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">Tidak ada kosakata yang tersedia.</td>
        </tr>
    <?php endif; ?>
</table>

<a href="dashboard.php">Kembali ke Dashboard</a>

</body>
</html>
