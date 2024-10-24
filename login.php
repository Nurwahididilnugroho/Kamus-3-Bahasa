<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Pengguna WHERE Email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['Password'])) {
            $_SESSION['ID_Pengguna'] = $row['ID_Pengguna'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Email tidak ditemukan.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    max-width: 400px; /* Adjusting the max-width for better aesthetics */
    margin: 0 auto; /* Centering the form */
}

form input[type="email"],
form input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ced4da;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

form input[type="email"]:focus,
form input[type="password"]:focus {
    border-color: #007bff;
    outline: none;
}

form input[type="submit"] {
    width: 100%;
    background-color: #007bff;
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
    background-color: #0056b3;
}

.error-message {
    color: red;
    text-align: center;
    margin: 10px 0;
}

    </style>
</head>
<body>
    <form method="post">
    Email: <input type="email" name="email" required>
    Password: <input type="password" name="password" required>
    <input type="submit" value="Login">
    <br><br>
    <a href="register.php">Registrasi</a>
</form>
</body>
</html>

