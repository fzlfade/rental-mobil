<?php
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
    <title>Tambah Mobil</title>
</head>
<body>
    <div class="container"><br>
        <div class="card">
            <div class="card-header">
                <h2 align="center">Tambah Mobil</h2>
            <form action="proses_tambah1.php" method="post">
                <tr>
                    <td>Jenis Mobil</td>
                    <input type="text" class="form-control" name="jenis_mobil">
                </tr><br>
                <tr>
                    <td>Warna</td>
                    <input type="text" class="form-control" name="warna">
                </tr><br>
                <tr>
                    <td>Stok</td>
                    <input type="number" class="form-control" name="stok">
                </tr><br>
                <tr>
                    <td>Tarif Sewa</td>
                    <input type="number" class="form-control" name="tarif_sewa">
                </tr><br>
                <input type="submit" value="Tambah" class="btn btn-info btn-sm form-control"><hr>
                <a href="mobil.php" class="btn btn-warning btn-sm form-control">Kembali</a>
            </form>
            </div>
        </div>
    </div>
    
    
</body>
</html>
<?php
}
?>