<?php 
include 'koneksi.php';
    session_start();
    if($_SESSION['status']!="login") {
        header("location: login.php");
    }
?>
<html>

<head>
    <title>Tambah Anggota</title>
    <link rel="stylesheet" href="tema.css">
</head>

<body>
    <h1 align='center' line-height='50%'>Tambah Anggota Di DB Anggota</h1>

    <div class="kotak">
        <form action="add-anggota.php" method="post">
            <label>Nama</label>
            <input placeholder="Contoh: Jhony" type="text" name="nama_anggota" class="form_login">
            <label>NIM</label>
            <input placeholder="Contoh: 21120118120025" type="number" name="nim" class="form_login">
            <label>Nomor HP</label>
            <input placeholder="Contoh: 0895360242060"  type="number" name="no_hp" class="form_login">
            <label>Bidang</label>
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
            <label>Jabatan</label>
            <select class="form_login" name="id_jabatan">
                <option disabled>Select</option>
                <?php
                   $sql="select * from tb_jabatan";

                    $hasil=mysqli_query($conn,$sql);
                    while ($data = mysqli_fetch_array($hasil)) {
                   ?>
                    <option value="<?php echo $data['id_jabatan'];?>"><?php echo $data['id_jabatan'];?>. <?php echo $data['nama_jabatan'];?></option>
                  <?php 
                    } ?>
                }
                ?>
            </select>
            <label>Hobi</label>
            <input placeholder="Pisahkan hobi yang lebih dari satu dengan tanda koma (,)." type="text" name="hobi" class="form_login">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form_login">
                <option disabled>Select</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <input type="submit" name="Submit" class="submitBtn" value="Simpan"> <br> <br>
            <button1 style="padding-right: 46%; padding-left: 45%"><a href="db-anggota.php">Batal</a></button1>
        </form>

    </div>
<br>
    <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $id_anggota = $_POST['id_anggota'];
        $nama_anggota = $_POST['nama_anggota'];
        $nim = $_POST['nim'];
        $hobi = $_POST['hobi'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $no_hp = $_POST['no_hp'];
        $id_bidang = $_POST['id_bidang'];
        $id_jabatan = $_POST['id_jabatan'];

        // include database connection file
        include_once("koneksi.php");

        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO tb_mahasiswa (nama_anggota, nim, no_hp, hobi, jenis_kelamin, id_bidang, id_jabatan) VALUES('$nama_anggota', '$nim', '$no_hp', '$hobi', '$jenis_kelamin', '$id_bidang', '$id_jabatan')");

        // Show message when user added
        echo "User added successfully. <a href='db-anggota.php'>View Users</a>";
        header("Location: db-anggota.php");
    }
    ?>
</body>

</html>