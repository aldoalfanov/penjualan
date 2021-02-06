<?php 
session_start();
include 'koneksi.php';

$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT *FROM pembayaran 
LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian='$id_pembelian' ");
$detbay=$ambil->fetch_assoc();

if(empty($detbay))
{
	echo "<script>alert('Belum ada data Pembayaran');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}

if($_SESSION["pelanggan"]['id_pelanggan']!==$detbay["id_pelanggan"])
{
	echo "<script>alert('Anda tidak berhak melihat Pembayaran orang lain');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8" />
		 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		 <!-- BOOTSTRAP STYLES-->
		 <link href="assets/css/bootstrap.css" rel="stylesheet" />
		 <!-- FONTAWESOME STYLES-->
		 <link href="assets/css/font-awesome.css" rel="stylesheet" />
		  <!-- CUSTOM STYLES-->
		 <link href="assets/css/custom.css" rel="stylesheet" />
		  <!-- GOOGLE FONTS-->
	 	 <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<title>Lihat Pembayaran</title>
</head>
<body>
 <?php include 'menu.php'; ?>


 <div class="container">
 	<h2>Lihat Pembayaran</h2>
 	<div class="row">
 		<div class="col-md-6">
 			<table class="table">
 				<tr>
 					<th>Nama</th>
 					<td><?php echo $detbay["nama"] ?></td>
 				</tr>
 					<th>Bank</th>
 					<td><?php echo $detbay["bank"] ?></td>
 				<tr>
 					<th>Tanggal</th>
 					<td><?php echo $detbay["tanggal"] ?></td>
 				</tr>
 				<tr>
 					<th>Jumlah</th>
 					<td>Rp.<?php echo number_format($detbay["jumlah"]) ?>,00
 						
 					</td>
 				</tr>
 			</table>
 		</div>
 		<div class="col-md-6">
 			<img src="img/<?php echo $detbay["bukti"] ?>" class="img-responsive">
 		</div>

 	</div>
 	
 </div>
</body>
</html>