<?php
include "koneksi.php";
$jenis_mobil = $_POST['jenis_mobil'];
$warna = $_POST['warna'];
$stok = $_POST['stok'];
$tarif_sewa = $_POST['tarif_sewa'];

$sql = "INSERT INTO mobil(jenis_mobil,warna,stok,tarif_sewa) VALUES ('$jenis_mobil','$warna','$stok','$tarif_sewa')";
$query = mysqli_query($koneksi,$sql);

if ($query) {
    header("location:mobil.php?tambah_mobil=berhasil");
}else {
    header("location:mobil.php?tambah_mobil=gagal");
}

?>