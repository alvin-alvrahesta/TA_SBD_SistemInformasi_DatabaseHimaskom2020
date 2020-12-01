<?php
// include database connection file
include_once("koneksi.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id_anggota = $_POST['id_anggota'];
    $nama_anggota = $_POST['nama_anggota'];
    $nim = $_POST['nim'];
    $id_bidang = $_POST['id_bidang'];
    $id_jabatan = $_POST['id_jabatan'];
    $no_hp = $_POST['no_hp'];
    $hobi = $_POST['hobi'];
    $jenis_kelamin = $_POST['jenis_kelamin'];


    // update user data
    $result = mysqli_query($conn, "UPDATE tb_mahasiswa SET id_anggota='$id_anggota',nama_anggota='$nama_anggota',nim='$nim',id_bidang='$id_bidang',id_jabatan='$id_jabatan',no_hp='$no_hp',hobi='$hobi',jenis_kelamin='$jenis_kelamin' WHERE id_anggota=$id_anggota");

    // Redirect to homepage to display updated user in list
    header("Location: db-anggota.php");
}
?>
<?php

$id_anggota = $_GET['id_anggota'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE id_anggota=$id_anggota");

while ($user_data = mysqli_fetch_array($result)) {
    $id_anggota = $user_data['id_anggota'];
    $nama_anggota = $user_data['nama_anggota'];
    $nim = $user_data['nim'];
    $id_bidang = $user_data['id_bidang'];
    $id_jabatan = $user_data['id_jabatan'];
    $no_hp = $user_data['no_hp'];
    $hobi = $user_data['hobi'];
    $jenis_kelamin = $user_data['jenis_kelamin'];
}
?>
<html>

<head>
    <title>Edit Tabel Anggota</title>
    <link rel="stylesheet"  href="tema.css">
</head>

<body>
    <h1 align='center' line-height='50%'>Edit Tabel Anggota</h1>

    <div class="kotak">
        <form action="edit-anggota.php" method="post">
            <input type="hidden" name="id_anggota" class="form_login" value='<?php echo $id_anggota; ?>'>
            <label>Nama Anggota</label>
            <input type="text" name="nama_anggota" class="form_login" value='<?php echo $nama_anggota; ?>'>
            <label>NIM</label>
            <input type="text" name="nim" class="form_login" value='<?php echo $nim; ?>'>
            <label>Nomor HP</label>
            <input type="text" name="no_hp" class="form_login" value='<?php echo $no_hp; ?>'>
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
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form_login">
                <option disabled>Select</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <label>Hobi</label>
            <input type="text" name="hobi" class="form_login" value='<?php echo $hobi; ?>'>
            <button1><a href="db-anggota.php">Batal</a></button1><br><br>
            <input type="submit" name="update" class="submitBtn" value="Update">
        </form>
    </div>
</body>

</html>