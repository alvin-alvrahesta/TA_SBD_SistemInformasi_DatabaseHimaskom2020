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
    <title> Proker Himaskom 2020 :) </title>
    <link rel="stylesheet" href="tema.css">
</head>
<body>
<div class="topnav" style="position: fixed; top:5px; width: 99%">
  <a href="index.php">Tampilan Lengkap Anggota</a>
  <a class="active" href="lengkap-proker.php">Tampilan Lengkap Proker</a>
  <a href="db-anggota.php">DB Anggota</a>
  <a href="db-proker.php">DB Proker</a>
  <a href="db-bidang.php">DB Bidang</a>
  <a href="db-jabatan.php">DB Jabatan</a>
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
    <h1 style="margin-top: 16px; color: #eeeeee" align="center">DATABASE PROKER HIMASKOM 2020</h1>
    <h2 align="center">Dibuat menggunakan Right Join</h2>
</div>
<div class="div2">
<table class="hoverTable" border="1" width="80%" align="center">
    <thead>
    <tr>
        <th>No.</th>
        <th>ID Bidang</th>
        <th>Nama Bidang</th>
        <th>Nama Proker</th>
        <th>ID Proker</th>
        <th>Tanggal Kegiatan</th>
        <th>Aksi</th>
        </tr>
    </thead>
<tbody>
<?php
$query = $_POST['query'];
$no=1;
if($query != ''){
	$result = mysqli_query($conn, "SELECT tb_bidang.id_bidang, tb_bidang.nama_bidang, tb_proker.nama_proker, tb_proker.id_proker, tb_proker.tanggal_proker FROM tb_proker RIGHT JOIN tb_bidang ON tb_proker.id_bidang=tb_bidang.id_bidang WHERE nama_bidang LIKE '%$query%' or nama_proker LIKE '%$query%' or tb_bidang.id_bidang LIKE '%$query%' or id_proker LIKE '%$query%' ORDER BY tb_bidang.id_bidang");
}else{
	 $result = mysqli_query($conn, "SELECT tb_bidang.id_bidang, tb_bidang.nama_bidang, tb_proker.nama_proker, tb_proker.id_proker,  tb_proker.tanggal_proker FROM tb_proker RIGHT JOIN tb_bidang ON tb_proker.id_bidang=tb_bidang.id_bidang ORDER BY tb_bidang.id_bidang");
}
if(mysqli_num_rows($result)){
while ($data = mysqli_fetch_array($result)){
    ?>
    <tr class="hoverTable">
        <td style="text-align: center; background-color: #bbbbbb"><?php echo $no++;?></td>
        <td style="text-align: center;"><?php echo $data['id_bidang'];?></td>
        <td style="text-align: left"><?php echo $data['nama_bidang'];?></td>
        <td style="text-align: left"><?php echo $data['nama_proker'];?></td>
        <td style="text-align: center"><?php echo $data['id_proker'];?></td>
        <td style="text-align: left"><?php echo date('D, d M yy', strtotime($data["tanggal_proker"])); ?></td>
        <td align="center"><button><a class=" Edit " href= "edit-lengkap-proker.php?id_proker=<?php echo $data['id_proker']; ?>">Edit</a></button>
    	<button1><a class=" Hapus " href= "delete-lengkap-proker.php?id_proker=<?php echo $data['id_proker']; ?>">Hapus</a></button1>
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
<br>
<div align="center">
<button4 onclick="location.href='add-lengkap-proker.php'"><a href="add-lengkap-proker.php"><span style="font-size: 18px">+</span> Tambah Proker</a></button4><br><br>
</div>
</body>
</html>
