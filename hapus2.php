<?php
include "koneksi.php";
$kd_customer = $_GET['kd_customer'];
$sql= "DELETE FROM customer WHERE kd_customer='$kd_customer'";
$query = mysqli_query($koneksi,$sql);

if ($query) {
    header('location:customer.php?hapus=berhasil');
}else {
    header('location:customer.php?hapus=gagal');
}
?>