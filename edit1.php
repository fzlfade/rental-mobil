<?php
include "koneksi.php";
$kd_mobil=$_GET['kd_mobil'];
$sql = "SELECT * FROM mobil WHERE kd_mobil='$kd_mobil'";
$query = mysqli_query($koneksi,$sql);

session_start();

if (!isset($_SESSION['login'])) {
    header("location:login.php");
} else {

while ($mobil = mysqli_fetch_assoc($query)) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css1/bootstrap.css">
    <title>Ubah Mobil</title>
</head>
<body>
    <div class="container"><br><br>
        <div class="card">
            <div class="card-header">
                <h2 align="center">Ubah Mobil</h2>
            <form action="proses_edit1.php" method="post">
                <input type="hidden" name="kd_mobil" value="<?=$mobil['kd_mobil']?>">
                <tr>
                    <td>Jenis Mobil</td>
                    <input type="text" class="form-control" name="jenis_mobil" value="<?=ucwords($mobil['jenis_mobil'])?>">
                </tr><br>
                <tr>
                    <td>Warna</td>
                    <input type="text" class="form-control" name="warna" value="<?=ucwords($mobil['warna'])?>">
                </tr><br>
                <tr>
                    <td>Stok</td>
                    <input type="number" class="form-control" name="stok" value="<?=ucwords($mobil['stok'])?>">
                </tr><br>
                <tr>
                    <td>Tarif Sewa</td>
                    <input type="number" class="form-control" name="tarif_sewa" value="<?=ucwords($mobil['tarif_sewa'])?>">
                </tr><br>
                <input type="submit" value="Ubah" class="btn btn-info btn-sm form-control"><hr>
                <a href="index.php" class="btn btn-warning btn-sm form-control">Kembali</a>
            </form>
            </div>
        </div>
    </div>
    
    
</body>
</html>
<?php
}
?>
<?php
}
?>