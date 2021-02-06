<?php
session_start();
include 'koneksi.php';
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
		  <title>Nota Pembelian</title>
</head>
<body>
<?php include'menu.php'; ?>
 <center>
 	<h2>TOKO AYAM MUTU</h2> <hr>
 	<h3>Detail Pembelian</h3>
 </center>
<br>
<section class="konten">
	<div class="container">


<?php
$ambil = $koneksi->query("SELECT *FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan
	WHERE pembelian.id_pembelian= '$_GET[id]' ");
$detail = $ambil->fetch_assoc();
?>
<!-- <pre><?php print_r($detail); ?></pre> -->

<?php
$idpelangganyangbeli=$detail["id_pelanggan"];
$idpelangganyanglogin=$_SESSION["pelanggan"]["id_pelanggan"];


if ($idpelangganyangbeli!==$idpelangganyanglogin)
{
	echo "<script>alert('ouchhh salah!');</script>";
	echo "<script>location='riwayat.php';</script>";

	exit();
}



?>
<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong>No Pembelian : <?php echo $detail['id_pembelian']; ?></strong> <br>
		Tanggal :<?php echo $detail['tanggal_pembelian']; ?> <br>
		Total :Rp. <?php echo number_format($detail['total_pembelian']); ?>,00
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		Nama :<strong><?php echo $detail['nama']; ?></strong> <br>
			No Telepon  :<?php echo $detail['No_telpn']; ?> <br>
			Username:<?php echo $detail['username'];?> <br> 
		
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong><?php echo $detail['nama_daerah']; ?> </strong> <br>
		Ongkos Kirim : Rp.  <?php echo number_format($detail['tarif']); ?>,00
	</div>
	
</div>

<table class="table table-bordered">
	<thead>
		<tr style="background-color: aqua;">
			<th>No.</th>
			<th>Nama Ayam</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Jumlah</th>
			<th>Subberat</th>
			<th>Subtotal</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT *FROM pembelian_ayam WHERE id_pembelian ='$_GET[id]' "); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) { ?>
		<tr style="background-color: gray;">
				<td><?php echo $nomor; ?>.</td>
				<td><?php echo $pecah['nama']; ?>.</td>
				<td>Rp.<?php echo number_format($pecah['harga']); ?>,00</td>
				<td><?php echo $pecah['berat']; ?>gr</td>
				<td><?php echo $pecah['jumlah']; ?></td>
				<td><?php echo $pecah['subberat']; ?>gr</td>
				<td>Rp. <?php echo number_format($pecah['subharga']); ?>,00</td>

		</tr>
	 	<?php $nomor++;?>
		<?php } ?>

	</tbody>
</table>
<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info alert">
		<p>
			Silahkan Melakukan Pembayaran Rp.  <?php echo number_format($detail['total_pembelian']); ?> Ke <br>
			<strong>BANK BNI 072-151-7281  LEO REYNALDO KARUNIA ALFANOV</strong>
		</p>
		</div>
	</div>
</div>
</section>
</body>
</html>
</div>