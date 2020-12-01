<?php 
include 'koneksi.php';
    session_start();
    if($_SESSION['status']!="login") {
        header("location: login.php");
    }
?>
<html>

<head>
    <title>Tambah proker</title>
    <link rel="stylesheet" href="tema.css">
</head>

<body>
    <h1 align='center' line-height='50%'>Tambah Proker</h1>

    <div class="kotak">
        <form action="add-proker.php" method="post">
            <label>Nama Poker</label>
            <input type="text" name="nama_proker" class="form_login">
            <label>Tanggal Proker</label>
            <input type="date" name="tanggal_proker" class="form_login">
            <label>ID Bidang</label>
            <select class="form_login" name="id_bidang">
                <option disabled>Select</option>
                <?php
                   $sql="select * from tb_bidang";

                    $hasil=mysqli_query($conn,$sql);
                    while ($data = mysqli_fetch_array($hasil)) {
                   ?>
                    <option value="<?php echo $data['id_bidang'];?>"><?php echo $data['id_bidang'];?>. <?php echo $data['nama_bidang'];?></option>
                  <?php 
                    } ?>
                }
                ?>
            </select>
            <input type="submit" name="Submit" class="submitBtn" value="Tambahkan"> <br> <br>
            <button1 style="padding-right: 46%; padding-left: 45%"><a href="db-proker.php">Batal</a></button1>
        </form>

    </div>
<br>
    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $id_proker = $_POST['id_proker'];
        $nama_proker = $_POST['nama_proker'];
        $tanggal_proker = $_POST['tanggal_proker'];
        $id_bidang = $_POST['id_bidang'];


        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO tb_proker (nama_proker, tanggal_proker, id_bidang) VALUES ('$nama_proker','$tanggal_proker','$id_bidang')");

        header("Location: db-proker.php");
    }
    ?>
</body>

</html>