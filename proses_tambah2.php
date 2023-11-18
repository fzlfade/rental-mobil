<?php
include "koneksi.php";
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

$sql = "INSERT INTO customer(nama,alamat,no_hp) VALUES ('$nama','$alamat','$no_hp')";
$query = mysqli_query($koneksi,$sql);

if ($query) {
    header("location:customer.php?tambah_customer=berhasil");
}else {
    header("location:customer.php?tambah_customer=gagal");
}

?>