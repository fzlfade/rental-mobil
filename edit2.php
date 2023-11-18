<?php
include "koneksi.php";
$kd_customer=$_GET['kd_customer'];
$sql = "SELECT * FROM customer WHERE kd_customer='$kd_customer'";
$query = mysqli_query($koneksi,$sql);

session_start();

if (!isset($_SESSION['login'])) {
    header("location:login.php");
} else {

while ($customer = mysqli_fetch_assoc($query)) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css1/bootstrap.css">
    <title>Ubah Customer</title>
</head>
<body>
    <div class="container"><br><br>
        <div class="card">
            <div class="card-header">
                <h2 align="center">Ubah Customer</h2>
            <form action="proses_edit2.php" method="post">
                <input type="hidden" name="kd_customer" value="<?=$customer['kd_customer']?>">
                <tr>
                    <td>Nama Costumer</td>
                    <input type="text" class="form-control" name="nama" value="<?=ucwords($customer['nama'])?>">
                </tr><br>
                <tr>
                    <td>Alamat</td>
                    <input type="text" class="form-control" name="alamat" value="<?=ucwords($customer['alamat'])?>">
                </tr><br>
                <tr>
                    <td>No Handphone</td>
                    <input type="number" class="form-control" name="no_hp" value="<?=$customer['no_hp']?>">
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