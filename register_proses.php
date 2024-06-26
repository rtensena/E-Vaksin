<?php
session_start();
include "koneksi.php";

$email    = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";

$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));

if ($query) {
    $_SESSION['username'] = $username;
    header("location: login.php?message=register");
}
?>