<?php
include "koneksi.php";
$sql_mobil = "SELECT * FROM mobil";
$query_mobil = mysqli_query($koneksi,$sql_mobil);
$sql_customer = "SELECT * FROM customer";
$query_customer = mysqli_query($koneksi,$sql_customer);

session_start();

if (!isset($_SESSION['login'])) {
    header("location:login.php");
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css1/bootstrap.css">
    <title>Tambah Sewa</title>
</head>
<body>
    <div class="container"><br><br>
        <div class="card">
            <div class="card-header">
                <h2 align="center">Tambah Sewa</h2>
                <form action="proses_tambah.php" method="post">
                <tr>
                    <td>Jenis Mobil
                        <select name="kd_mobil" id="" class="form-select">
                            <option value="">...</option>
                            <?php while ($mobil=mysqli_fetch_assoc($query_mobil)) {?>
                                <option value="<?= $mobil['kd_mobil'] ?>" <?php  if($mobil['stok']<=0){echo"disabled";}?>><?=ucwords($mobil['jenis_mobil'])?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr><br>
                <tr>
                    <td>Nama Customer
                        <select name="kd_customer" id="" class="form-select">
                            <option value="">...</option>
                            <?php while ($customer=mysqli_fetch_assoc($query_customer)) {?>
                                <option value="<?= $customer['kd_customer'] ?>"><?=ucwords($customer['nama'])?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr><br>
                <tr>
                    <td>Tanggal Pinjam</td>
                    <input type="date" name="tgl_pinjam" id="" class="form-control">
                </tr><br>
                <tr>
                    <td>Tanggal Kembali</td>
                    <input type="date" name="tgl_kembali" id="" class="form-control">
                </tr><br>
                <input type="submit" value="Tambah" class="btn btn-info btn-sm form-control"><hr>
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