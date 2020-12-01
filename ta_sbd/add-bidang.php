<?php 
include 'koneksi.php';
    session_start();
    if($_SESSION['status']!="login") {
        header("location: login.php");
    }
?>
<html>

<head>
    <title>Tambah Bidang</title>
    <link rel="stylesheet" href="tema.css">
</head>

<body>
    <h1 align='center' line-height='50%'>Tambah Bidang</h1>

    <div class="kotak">
        <form action="add-bidang.php" method="post">
            <label>Nama Bidang</label>
            <input type="text" name="nama_bidang" class="form_login">
            <input type="submit" name="Submit" class="submitBtn" value="Tambahkan"> <br> <br>
            <button1 style="padding-right: 46%; padding-left: 45%"><a href="db-bidang.php">Batal</a></button1>
        </form>

    </div>
<br>
    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $id_anggota = $_POST['id_anggota'];
        $nama_bidang = $_POST['nama_bidang'];


        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO tb_bidang (nama_bidang) VALUES ('$nama_bidang')");

        header("Location: db-bidang.php");
    }
    ?>
</body>

</html>