<?php
include "koneksi.php";
$kd_sewa = $_GET['kd_sewa'];
$sql = "SELECT * FROM sewa WHERE kd_sewa='$kd_sewa'";
$query = mysqli_query($koneksi,$sql);
$sql_mobil = "SELECT * FROM mobil";
$query_mobil = mysqli_query($koneksi,$sql_mobil);
$sql_customer = "SELECT * FROM customer";
$query_customer = mysqli_query($koneksi,$sql_customer);

session_start();

if (!isset($_SESSION['login'])) {
    header("location:login.php");
} else {

while ($sewa = mysqli_fetch_assoc($query)) {
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css1/bootstrap.css">
    <title>Ubah Sewa</title>
</head>
<body>
    <div class="container"><br><br>
        <div class="card">
            <div class="card-header">
                <h2 align="center">Ubah Sewa</h2><hr>
                <form action="proses_edit.php" method="post">
                    <input type="hidden" name="kd_sewa" value="<?=$sewa['kd_sewa']?>">
                <tr>
                    <td>Jenis Mobil
                        <select name="kd_mobil" id="" class="form-select">
                            <option value="">...</option>
                            <?php while ($mobil=mysqli_fetch_assoc($query_mobil)) {?>
                                <option value="<?= $mobil['kd_mobil'] ?>" <?php if($mobil['kd_mobil']==$sewa['kd_mobil']){echo "selected";}?> <?php if($mobil['stok']<=0){echo"disabled";}?> ><?=ucwords($mobil['jenis_mobil'])?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr><br>
                <tr>
                    <td>Nama Customer
                        <select name="kd_customer" id="" class="form-select">
                            <option value="">...</option>
                            <?php while ($customer=mysqli_fetch_assoc($query_customer)) {?>
                                <option value="<?= $customer['kd_customer'] ?>" <?php if($customer['kd_customer']==$sewa['kd_customer']){echo "selected";}?>><?=ucwords($customer['nama'])?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr><br>
                <tr>
                    <td>Tanggal Pinjam</td>
                    <input type="date" name="tgl_pinjam" id="" value="<?=$sewa['tgl_pinjam']?>" class="form-control">
                </tr><br>
                <tr>
                    <td>Tanggal Kembali</td>
                    <input type="date" name="tgl_kembali" id="" value="<?=$sewa['tgl_kembali']?>" class="form-control">
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
}
?>