<?php
include "koneksi.php";
$kd_customer = $_POST['kd_customer'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

$sql = "UPDATE customer SET nama='$nama',alamat='$alamat',no_hp='$no_hp' WHERE kd_customer='$kd_customer'";
$query = mysqli_query($koneksi,$sql);

if ($query) {
    header("location:customer.php?edit_customer=berhasil");
}else {
    header("location:customer.php?edit_customer=gagal");
}

?>