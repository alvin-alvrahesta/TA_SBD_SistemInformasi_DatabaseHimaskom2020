<?php 
include 'koneksi.php';
    session_start();
    if($_SESSION['status']!="login") {
        header("location: login.php");
    }
?>
<html>

<head>
    <title>Tambah jabatan</title>
    <link rel="stylesheet" href="tema.css">
</head>

<body>
    <h1 align='center' line-height='50%'>Tambah jabatan</h1>

    <div class="kotak">
        <form action="add-jabatan.php" method="post">
            <label>Nama jabatan</label>
            <input type="text" name="nama_jabatan" class="form_login">
            <input type="submit" name="Submit" class="submitBtn" value="Tambahkan"> <br> <br>
            <button1 style="padding-right: 46%; padding-left: 45%"><a href="db-jabatan.php">Batal</a></button1>
        </form>

    </div>
<br>
    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $id_jabatan = $_POST['id_jabatan'];
        $nama_jabatan = $_POST['nama_jabatan'];


        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO tb_jabatan (nama_jabatan) VALUES ('$nama_jabatan')");

        header("Location: db-jabatan.php");
    }
    ?>
</body>

</html>