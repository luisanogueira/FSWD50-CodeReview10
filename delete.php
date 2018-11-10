<?php
header("Location: index.php");

include_once "dbconnect.php";
$db = new Database();
$conn = $db->connectDB();

$query = "DELETE FROM media_info WHERE ID=0";
mysqli_query($conn, $query);

$query = "DELETE FROM media WHERE ID=0";
mysqli_query($conn, $query);

$query = "DELETE FROM author WHERE ID=0";
mysqli_query($conn, $query);

$query = "DELETE FROM publisher WHERE ID=0";
mysqli_query($conn, $query);

mysqli_close($conn);
?>