<?php
function logged_in() {
    return isset($_SESSION['user_id']);
}

function login_check($email, $password) {

}

function user_data(){

}

function user_register($email, $name, $password) {
    // $email = mysql_real_escape_string($email);
    // $name = mysql_real_escape_string($name);
    // mysql_query("INSERT INTO `db_users` VALUES ('', '$email', '$name', '".md5($password)."')");

    // return mysql_insert_id();


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

$sql = "INSERT INTO db_users (email, name, password)
VALUES ('$email', '$name', '".md5($password)."')";


if (mysqli_query($conn, $sql)) {
  // echo "Inserted Successful";
  return mysqli_insert_id($conn);
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}

function user_exists($email) {
    // $email = mysql_real_escape_string($email);
    // $query = mysql_query("SELECT COUNT(`user_id`) FROM `db_users` WHERE `email`='$email'");
    // return (mysql_result($query, 0) == 1) ? true : false;

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

$sql = "SELECT COUNT(`id`) FROM `db_users` WHERE `email`='$email'";


$sql = "SELECT COUNT(`id`) FROM `db_users` WHERE `email`='$email'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_row($result);
    echo $row[0];   

    if ($row[0] > 0) {
        return true;
    }
    else {
        return false;
    }

mysqli_close($conn);
}
?>