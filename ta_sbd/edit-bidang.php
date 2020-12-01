<?php
// include database connection file
include_once("koneksi.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id_bidang = $_POST['id_bidang'];
    $nama_bidang = $_POST['nama_bidang'];
 


    // update user data
    $result = mysqli_query($conn, "UPDATE tb_bidang SET id_bidang='$id_bidang',nama_bidang='$nama_bidang' WHERE id_bidang=$id_bidang");

    // Redirect to homepage to display updated user in list
    header("Location: db-bidang.php");
}
?>
<?php

$id_bidang = $_GET['id_bidang'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM tb_bidang WHERE id_bidang=$id_bidang");

while ($user_data = mysqli_fetch_array($result)) {
    $id_bidang = $user_data['id_bidang'];
    $nama_bidang = $user_data['nama_bidang'];

}
?>
<html>

<head>
    <title>Edit User</title>
    <link rel="stylesheet"  href="tema.css">
</head>

<body>
    <h1 align='center' line-height='50%'>Edit Data Bidang</h1>

    <div class="kotak">
        <form action="edit-bidang.php" method="post">
            <input type="hidden" name="id_bidang" class="form_login" value=<?php echo $id_bidang; ?>>
            <label>Nama Bidang</label>
            <input type="text" name="nama_bidang" class="form_login" value='<?php echo $nama_bidang; ?>'>
            <button1><a href="db-bidang.php">Batal</a></button1><br><br>
            <input type="submit" name="update" class="submitBtn" value="Update">
        </form>
    </div>
</body>

</html>