<?php
// include database connection file
include_once("koneksi.php");

// Get id from URL to delete that user
$id_anggota = $_GET['id_anggota'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM tb_mahasiswa WHERE id_anggota=$id_anggota");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
