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
  <a class="active" href="db-proker.php">DB Proker</a>
  <a href="db-bidang.php">DB Bidang</a>
  <a href="db-jabatan.php">DB Jabatan</a>
  <a style="margin-top:5px; margin-left: 7px; background-color: #802020; float: right; padding-top: 10px; padding-bottom: 9px;" href="logout.php">Log Out</a>
  <a style="padding: 0px; float: right;"><form action="" method="POST">
    <input type="text" name="query" placeholder="Cari Data" class="form_cari">
    <input class="btn_cari" type="submit" name="cari" value="Search">
    </form>
    </a>
</div>

</div>
<div class="div1 main">
    <img src="logo.png" style="float: right; height: 93px; width: 80px; padding-top: 5px;padding-bottom: 5px;padding-right: 15px;padding-left: 15px; margin: 5px; background-color: white; border-radius: 5px">
    <img src="undip1.png" style="float: left; height: 93px; width: 93px; padding-top: 5px;padding-bottom: 5px;padding-right: 9px;padding-left: 9px; margin: 5px; background-color: white; border-radius: 5px">
    <h1 style="margin-top: 16px; color: #eeeeee" align="center">Tabel Asli tb_proker</h1>
    <h2 align="center">Ditampilkan Dengan Query Select * From tb_proker</h2>
</div>
<div class="div2">
<table class="hoverTable" border="1" width="70%" align="center">
    <thead>
    <tr>
        <th>No.</th>
        <th>ID Proker</th>
        <th>Nama Proker</th>
        <th>Tanggal Proker</th>
        <th>ID Bidang</th>
        <th>Aksi</th>
        </tr>
    </thead>
<tbody>
<?php
$query = $_POST['query'];

if($query != ''){
    $result = mysqli_query($conn, "SELECT * FROM tb_proker WHERE id_proker LIKE '%$query%' or nama_proker LIKE '%$query%' ORDER BY id_proker");
}else{
     $result = mysqli_query($conn, "SELECT * FROM tb_proker");
}
$no=1;
if(mysqli_num_rows($result)){
while ($data = mysqli_fetch_array($result)){
    ?>
    <tr class="hoverTable">
        <td style="text-align: center; background-color: #bbbbbb"><?php echo $no++;?></td>
        <td style="text-align: center;"><?php echo $data['id_proker'];?></td>
        <td style="text-align: left"><?php echo $data['nama_proker'];?></td>
        <td style="text-align: left"><?php echo date('D, d M yy', strtotime($data["tanggal_proker"])); ?></td>
        <td style="text-align: center;"><?php echo $data['id_bidang'];?></td>
        <td align="center">
        <button><a class=" Edit " href= "edit-proker.php?id_proker=<?php echo $data['id_proker']; ?>">Edit</a></button>
        <button1><a class=" Hapus " href= "delete-proker.php?id_proker=<?php echo $data['id_proker']; ?>">Hapus</a></button1>
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
<button4 onclick="location.href='add-proker.php'"><a href="add-proker.php"><span style="font-size: 18px">+</span> Tambah Proker</a></button4><br><br>
</div>
</body>
</html>
