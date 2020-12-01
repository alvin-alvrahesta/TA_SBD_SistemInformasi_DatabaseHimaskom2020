<?php
// include database connection file
include_once("koneksi.php");

// Get id from URL to delete that user
$id_jabatan = $_GET['id_jabatan'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM tb_jabatan WHERE id_jabatan=$id_jabatan");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:db-jabatan.php");
