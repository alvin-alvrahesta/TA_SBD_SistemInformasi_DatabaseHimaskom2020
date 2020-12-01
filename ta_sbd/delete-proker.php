<?php
// include database connection file
include_once("koneksi.php");

// Get id from URL to delete that user
$id_proker = $_GET['id_proker'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM tb_proker WHERE id_proker=$id_proker");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:db-proker.php");
