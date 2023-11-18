<?php
include "koneksi.php";
$sql = "SELECT *,mobil.jenis_mobil,customer.nama FROM sewa
JOIN mobil ON sewa.kd_mobil=mobil.kd_mobil
JOIN customer ON sewa.kd_customer=customer.kd_customer";
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
    <title>DATA SEWA</title>
    <style>
        @media print {
            #cetak {
                visibility:hidden;
            }
            #printable{
            display:flex;
            justify-content:center;
            align-items:center;
            height:100%;
            }
            html, body{
            height:100%;
            width:100%;
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
        <li><a href="index.php" class="nav-link px-2 link-primary">Data Sewa</a></li>
        <li><a href="mobil.php" class="nav-link px-2 link-dark">Data Mobil</a></li>
        <li><a href="customer.php" class="nav-link px-2 link-dark">Data Customer</a></li>
      </ul>

      <div class="col-md-3 text-end">
      <a href="logout.php"><button type="button" class="btn btn-dark btn-sm" id="cetak">Logout</button></a>
      </div>
    </header>
  </div>
    <div class="container">
                <h4>Data Sewa
                <a href="tambah.php"><button class="btn btn-outline-primary float-end btn-sm" id="cetak">Tambah Sewa</button></a>
                </h4><hr>
                <div class="container" id="printable">
                <table class="table table-bordered table-striped">
                
                    <tr class="table-dark" align="center">
                        <td>No</td>
                        <td>Kode Sewa</td>
                        <td>Jenis Mobil</td>
                        <td>Nama Customer</td>
                        <td>Tanggal Pinjam</td>
                        <td>Tanggal Kembali</td>
                        <td>Total Sewa</td>
                        <td id="cetak">Opsi</td>
                    </tr>
                    <?php
                    $nomer = 1;
                    while($sewa=mysqli_fetch_assoc($query)){
                        echo "<tr align='center'>";
                        echo "<td>". $nomer++ ."</td>";
                        echo "<td>". $sewa['kd_sewa'] ."</td>";
                        echo "<td>". ucwords($sewa['jenis_mobil']) ."</td>";
                        echo "<td>". ucwords($sewa['nama']) ."</td>";
                        echo "<td>". date("d-m-y",strtotime($sewa['tgl_pinjam'])) ."</td>";
                        echo "<td>". date("d-m-y",strtotime($sewa['tgl_kembali'])) ."</td>";
                        echo "<td>".  number_format($sewa['total_sewa']) ."</td>";
                        echo "<td id='cetak'>";
                        echo "<a href='hapus.php?kd_sewa=".  $sewa['kd_sewa'] ."'><button class='btn btn-danger btn-sm' id='cetak'>Kembalikan</button></a>";
                        echo "|";
                        echo "<a href='edit.php?kd_sewa=".  $sewa['kd_sewa'] ."'><button class='btn btn-success btn-sm' id='cetak'>Ubah Data</button></a>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    ?>
                    
                
            </div>
        </div>
    </table>
    <button onclick="window.print();" class="btn btn-secondary float-end btn-sm form-control" id="cetak">Cetak</button>
</body>
</html>
<?php
}
?>