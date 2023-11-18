<?php
include "koneksi.php";
$kd_mobil = $_POST['kd_mobil'];
$kd_customer = $_POST['kd_customer'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];

if ($tgl_pinjam > $tgl_kembali) {
    echo "<script>alert('Tanggal Tidak Cocok'); history.back();</script>";
}else {
    $diff = date_diff(date_create($tgl_pinjam),date_create($tgl_kembali));
    $hari = $diff->format("%a")+ 1;

    $sql = "SELECT * FROM mobil WHERE kd_mobil='$kd_mobil'";
    $query = mysqli_query($koneksi,$sql);
    while ($mobil = mysqli_fetch_assoc($query)) {
        $tarif_sewa = $mobil['tarif_sewa'];
        $stok = $mobil['stok'];
    }
    $total_sewa = $hari * $tarif_sewa;
    
    $sql2 = "INSERT INTO sewa (kd_mobil,kd_customer,tgl_pinjam,tgl_kembali,total_sewa)VALUES ('$kd_mobil','$kd_customer','$tgl_pinjam','$tgl_kembali','$total_sewa')";
    $query2 = mysqli_query($koneksi,$sql2);
    if ($query2) {
        header("location:index.php?tambah=berhasil");
    }else {
        header("location:index.php?tambah=gagal");
    }
}

?>