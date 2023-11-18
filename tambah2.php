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
                <h2 align="center">Tambah Customer</h2>
            <form action="proses_tambah2.php" method="post">
                <tr>
                    <td>Nama Costumer</td>
                    <input type="text" class="form-control" name="nama">
                </tr><br>
                <tr>
                    <td>Alamat</td>
                    <input type="text" class="form-control" name="alamat">
                </tr><br>
                <tr>
                    <td>Nomer Handphone</td>
                    <input type="number" class="form-control" name="no_hp">
                </tr><br>
                <input type="submit" value="Tambah" class="btn btn-info btn-sm form-control"><hr>
                <a href="customer.php" class="btn btn-warning btn-sm form-control">Kembali</a>
            </form>
            </div>
        </div>
    </div>
    
    
</body>
</html>
<?php
}
?>