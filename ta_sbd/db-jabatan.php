<?php 
error_reporting(0);
include 'koneksi.php';
    session_start();
    if($_SESSION['status']!="login") {
    	header("location: login.php");

    }
?>
<!DOCTYPE html>
<html>
<head>
	<title> Database Himaskom 2020 :) </title>
    <link rel="stylesheet" href="tema.css">
</head>
<body>
<div class="topnav" style="position: fixed; top:5px; width: 99%">
  <a href="index.php">Tampilan Lengkap Anggota</a>
  <a href="lengkap-proker.php">Tampilan Lengkap Proker</a>
  <a href="db-anggota.php">DB Anggota</a>
  <a href="db-proker.php">DB Proker</a>
  <a href="db-bidang.php">DB Bidang</a>
  <a class="active" href="db-jabatan.php">DB Jabatan</a>
  <a style="margin-top:5px; margin-left: 7px; background-color: #802020; float: right; padding-top: 10px; padding-bottom: 9px;" href="logout.php">Log Out</a>
    <a style="padding: 0px; float: right;"><form action="" method="POST">
    <input type="text" name="query" placeholder="Cari Data" class="form_cari">
    <input class="btn_cari" type="submit" name="cari" value="Search">
    </form>
    </a>
</div>

<div class="div1 main">
    <img src="logo.png" style="float: right; height: 93px; width: 80px; padding-top: 5px;padding-bottom: 5px;padding-right: 15px;padding-left: 15px; margin: 5px; background-color: white; border-radius: 5px">
    <img src="undip1.png" style="float: left; height: 93px; width: 93px; padding-top: 5px;padding-bottom: 5px;padding-right: 9px;padding-left: 9px; margin: 5px; background-color: white; border-radius: 5px">
    <h1 style="margin-top: 16px; color: #eeeeee" align="center">Tabel Asli tb_jabatan</h1>
    <h2 align="center">Ditampilkan Dengan Query Select * From tb_jabatan</h2>
</div>
<div class="div2">
<table class="hoverTable" border="1" width="50%" align="center">
    <thead>
    <tr>
        <th>No.</th>
        <th>ID Jabatan</th>
        <th>Nama Jabatan</th>
        <th>Aksi</th>
        </tr>
    </thead>
<tbody>
<?php
$query = $_POST['query'];
$no=1;
if($query != ''){
    $result = mysqli_query($conn, "SELECT * FROM tb_jabatan WHERE id_jabatan LIKE '%$query%' or nama_jabatan LIKE '%$query%' ORDER BY id_jabatan");
}else{
     $result = mysqli_query($conn, "SELECT * FROM tb_jabatan");
}

if(mysqli_num_rows($result)){
while ($data = mysqli_fetch_array($result)){
    ?>
    <tr class="hoverTable">
        <td style="text-align: center; background-color: #bbbbbb"><?php echo $no++;?></td>
        <td style="text-align: center;"><?php echo $data['id_jabatan'];?></td>
        <td style="text-align: left"><?php echo $data['nama_jabatan'];?></td>
        <td align="center">
        <button><a href= "edit-jabatan.php?id_jabatan=<?php echo $data['id_jabatan']; ?>">Edit</a></button>
        <button1><a href= "delete-jabatan.php?id_jabatan=<?php echo $data['id_jabatan']; ?>">Hapus</a></button1>
        </td>
    </tr>
<?php
}}else{
	echo '<tr><td colspan="9">Data Tidak Ditemukan</td></tr>';
}
?>
</tbody>
</table>
</div>

<div align="center">
<button4 onclick="location.href='add-jabatan.php'" ><a href="add-jabatan.php"><span style="font-size: 18px">+</span> Tambah Jabatan</a></button4><br><br>
</div>
</body>
</html>
