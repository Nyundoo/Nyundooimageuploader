<?php
ob_start();
session_start();

$servername = "localhost";
$username = "kketrades";
$password = "Sifed32365042?";
$dbname = "pitstop_upload";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

include 'func/user.func.php';
include 'func/album.func.php';
include 'func/image.func.php';
include 'func/thumb.func.php';
?>