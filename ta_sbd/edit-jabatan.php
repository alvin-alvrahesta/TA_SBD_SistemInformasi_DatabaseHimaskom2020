<?php
// include database connection file
include_once("koneksi.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id_jabatan = $_POST['id_jabatan'];
    $nama_jabatan = $_POST['nama_jabatan'];
 


    // update user data
    $result = mysqli_query($conn, "UPDATE tb_jabatan SET id_jabatan='$id_jabatan',nama_jabatan='$nama_jabatan' WHERE id_jabatan=$id_jabatan");

    // Redirect to homepage to display updated user in list
    header("Location: db-jabatan.php");
}
?>
<?php

$id_jabatan = $_GET['id_jabatan'];

// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM tb_jabatan WHERE id_jabatan=$id_jabatan");

while ($user_data = mysqli_fetch_array($result)) {
    $id_jabatan = $user_data['id_jabatan'];
    $nama_jabatan = $user_data['nama_jabatan'];

}
?>
<html>

<head>
    <title>Edit User</title>
    <link rel="stylesheet"  href="tema.css">
</head>

<body>
    <h1 align='center' line-height='50%'>Edit Data Jabatan</h1>

    <div class="kotak">
        <form action="edit-jabatan.php" method="post">
            <input type="hidden" name="id_jabatan" class="form_login" value=<?php echo $id_jabatan; ?>>
            <label>Nama Jabatan</label>
            <input type="text" name="nama_jabatan" class="form_login" value='<?php echo $nama_jabatan; ?>'>
            <button1><a href="db-jabatan.php">Batal</a></button1><br><br>
            <input type="submit" name="update" class="submitBtn" value="Update">
        </form>
    </div>
</body>

</html>