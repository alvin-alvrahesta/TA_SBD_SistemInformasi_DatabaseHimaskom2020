<?php
// include database connection file
include_once("koneksi.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id_proker = $_POST['id_proker'];
    $nama_proker = $_POST['nama_proker'];
    $tanggal_proker = $_POST['tanggal_proker'];
    $id_bidang = $_POST['id_bidang'];
 


    // update user data
    $result = mysqli_query($conn, "UPDATE tb_proker SET id_proker='$id_proker',nama_proker='$nama_proker',tanggal_proker='$tanggal_proker', id_bidang='$id_bidang' WHERE id_proker=$id_proker");

    // Redirect to homepage to display updated user in list
    header("Location: lengkap-proker.php");
}
?>
<?php

$id_proker = $_GET['id_proker'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM tb_proker WHERE id_proker=$id_proker");

while ($user_data = mysqli_fetch_array($result)) {
    $id_proker = $user_data['id_proker'];
    $nama_proker = $user_data['nama_proker'];
    $tanggal_proker = $user_data['tanggal_proker'];
    $id_bidang = $user_data['id_bidang'];
}
?>
<html>

<head>
    <title>Edit Proker</title>
    <link rel="stylesheet"  href="tema.css">
</head>

<body>
    <h1 align='center' line-height='50%'>Edit Data Proker</h1>

    <div class="kotak">
        <form action="edit-lengkap-proker.php" method="post">
            <input type="hidden" name="id_proker" class="form_login" value=<?php echo $id_proker; ?>>
            <label>Nama Proker</label>
            <input type="text" name="nama_proker" class="form_login" value='<?php echo $nama_proker; ?>'>
            <label>Tanggal Proker</label>
            <input type="date" name="tanggal_proker" class="form_login" value='<?php echo date('D, d M yy', strtotime($tanggal_proker)); ?>'>
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
            <button1><a href="lengkap-proker.php">Batal</a></button1><br><br>
            <input type="submit" name="update" class="submitBtn" value="Update">
        </form>
    </div>
</body>

</html>