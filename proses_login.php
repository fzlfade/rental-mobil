<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password=md5('$password')");

if (mysqli_num_rows($query)>0) {
    $_SESSION['login']='admin';
    header("location:index.php?login=berhasil");
} else {
    echo "<script>alert('Username dan Password Tidak Cocok'); history.back();</script>";
}