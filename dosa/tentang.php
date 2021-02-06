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
		  <title>TOKO Ayam </title>
</head>
<body>
	<p>
		<img src="gambar/header1.jpg" width="1350" height="525" alt=""/>
	</p>
	<?php include'menu.php'; ?> 
<div style="min-height: 450px;">			
	<div class="content">
		<center><h1>Terima Kasih Telah Mengunjungi Toko Kami</h1></center><hr>	
		<br>
		<h3>Toko Ayam Mutu adalah sebuah toko yang menjual ayam yang terletak di Labuan Bajo.Toko Ayam Mutu Menjual dua jenis ayam yaitu ayam kampung dan ayam broiler yang sehat dan berkualitas.</h3>
		<br>
		<h3>1. Ayam Kampung</h3>
		<br>
			<center><img src="gambar/ayam kampung.jpg" width="500px" height="400px"></center>
		<br>
		<h3>2. Ayam Broiler</h3>
		<br>
			<center><img src="gambar/ayam broiler.jpg" width="500px" height="400px"></center>
		<br>
	</div>
</div>
</body>
</html>