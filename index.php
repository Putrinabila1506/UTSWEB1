<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}
$error='';
if (isset($_POST['x']) && isset($_POST['y'])) {
    $username = $_POST['x'];
    $password = $_POST['y'];

    $result = mysqli_query($conn, "SELECT * FROM tbl_users WHERE username='$username'");

    if ($row = mysqli_fetch_assoc($result)) {
        if ($password == $row['password']) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['nama'] = $row['nama_lengkap'];
            $_SESSION['role'] = $row['role'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #00c9a7, #92fe9d);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            width: 300px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        button {
            width: 100%;
            background: #00c9a7;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover {
            background: #00b894;
        }
        .error {
            color: red;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="post" action="">
            <label>Username:</label>
            <input type="text" name="x" required placeholder="Masukkan username">

            <label>Password:</label>
            <input type="password" name="y" required placeholder="Masukkan password">

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>