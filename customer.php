<?php
include "koneksi.php";
$sql = "SELECT * FROM customer";
$query = mysqli_query($koneksi,$sql);

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
    <title>DATA CUSTOMER</title>
    <style>
        @media print{
            #cetak {
                visibility:hidden;
            }
        }
    </style>
</head>
<body>
<div class="container" id="cetak">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index.php" class="nav-link px-2 link-dark">Data Sewa</a></li>
        <li><a href="mobil.php" class="nav-link px-2 link-dark">Data Mobil</a></li>
        <li><a href="customer.php" class="nav-link px-2 link-primary">Data Customer</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <a href="logout.php"><button type="button" class="btn btn-dark btn-sm">Logout</button></a>
      </div>
    </header>
    
  </div>
    <div class="container bg-outline-success">
        <!-- <div class="card">
            <div class="card-header"> -->
                <h4>Data Customer
                <a href="tambah2.php"><button class="btn btn-outline-primary float-end btn-sm" id="cetak">Tambah Customer</button></a></h4><hr>
                <table class="table table-bordered table-striped">
                    <tr class="table-dark" align="center">
                        <td>No</td>
                        <td>Kode Customer</td>
                        <td>Nama Customer</td>
                        <td>Alamat</td>
                        <td>Nomor Handphone</td>
                        <td id="cetak">Opsi</td>
                    </tr>
                    <?php
                    $nomer = 1;
                    while($customer=mysqli_fetch_assoc($query)){
                        echo "<tr align='center'>";
                        echo "<td>". $nomer++ ."</td>";
                        echo "<td>". $customer['kd_customer'] ."</td>";
                        echo "<td>". ucwords($customer['nama']) ."</td>";
                        echo "<td>". ucwords($customer['alamat']) ."</td>";
                        echo "<td>". $customer['no_hp'] ."</td>";
                        echo "<td id='cetak'>";
                        echo "<a href='hapus2.php?kd_customer=".  $customer['kd_customer'] ."'><button class='btn btn-danger btn-sm'>Hapus</button></a>";
                        echo "|";
                        echo "<a href='edit2.php?kd_customer=".  $customer['kd_customer'] ."'><button class='btn btn-success btn-sm'>Ubah</button></a>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    ?>
                </div>
            </div>
        </div>
    </table>
    <button onclick="window.print()" class="btn btn-secondary float-end btn-sm form-control" id="cetak">Cetak</button>
</body>
</html>
<?php
}
?>