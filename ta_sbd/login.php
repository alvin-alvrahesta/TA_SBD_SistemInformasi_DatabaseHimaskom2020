<?php 
session_start();
include 'koneksi.php';

if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST["password"]);
        $data = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

$cek = mysqli_num_rows($data);

        if($cek > 0) {
            $_SESSION['status'] = 'login';
            echo "<script>window.alert('Login Success')
            window.location='index.php'</script>";
        }else {
            echo "<script>window.alert('Kesalahan Login')
            window.location='login.php'</script>";
        }
    }

?>
<html>
<head>
<body>
    <title>Login Database Himaskom 2020</title> 
    <link rel="stylesheet" type="text/css" href="tema.css">
</head>
<body>
<br>


    <div class="kotak">
    <div class="div3">
    <img src="logo.png" style="float: right; height: 105px; width: 90px; padding: 5px; padding-right: 9px">
    <h2 style="margin-top: 16px; color: #eeeeee" align="center">SELAMAT DATANG DI DATABASE HIMASKOM 2020</h2>
    </div>
    <form action="" method="post">      
        <label>Username</label>
        <input class="form_login" type="text" name="username" required>
        <label>Password</label>
        <input class="form_login" type="password" name="password" required>
        <input class="submitBtn" type="submit" name="login" value="Log In">
    </form>
    </div>
    <h3 style="color:#bbbbbb" align="center">Tugas Akhir Praktikum SBD 2020</h3>
    <h3 style="color:#bbbbbb" align="center">Alvin Alvrahesta - 21120118120025</h3>
</body>
</html>
