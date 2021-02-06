<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='Login.php';</script>";
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
		<!-- Bootstrap CSS -->
	    
</head>
<body>
<?php include'menu.php'; ?>
 <center><h2>TOKO AYAM MUTU  </h2></center>
<hr>
<section class="riwayat">
	<div class="container">
		<center>
		<h3 class="fa fa-shopping-cart"> Riwayat Belanja Pelanggan <?php echo $_SESSION["pelanggan"]["nama"] ?> </h3>
		</center>
		<br>
		<table class="table table-bordered ">
			<thead>
				<tr style="background-color:aqua;">
					<th>No.</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$nomor=1;
				$id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
				$ambil=$koneksi->query("SELECT *FROM pembelian WHERE id_pelanggan='$id_pelanggan' ");
				while ($pecah = $ambil->fetch_assoc()) { ?>
				
				<tr>
					<td><?php echo $nomor; ?>.</td>
					<td><?php echo $pecah["tanggal_pembelian"] ?></td>
					<td>
						<?php echo $pecah["status_pembelian"] ?>
						<br>
						<?php if(!empty($pecah['resi_pengiriman'])): ?>
						Resi: <?php echo $pecah['resi_pengiriman']; ?>
						<?php endif ?>


					</td>
					<td>Rp. <?php echo number_format($pecah["total_pembelian"]) ?>,00</td>
					<td>
						<a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info btn-xs">Nota</a>
						
						<?php if ($pecah['status_pembelian']=="pending"): ?>
						<a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-success btn-xs">Pembayaran</a>
						<?php else:?>
							<a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>"  class="btn btn-warning btn-xs">
								Lihat Pembayaran
							</a>
						<?php endif ?>
					</td>
				</tr>
			<?php $nomor++; ?>	
			<?php } ?>
			</tbody>
			
		</table>
		
	</div>
	
</section>
</body>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</html>
</div>