<?php session_start(); ?>
<?php
 include 'koneksi.php';
?>

<?php
$id_ayam = $_GET["id"];

$ambil = $koneksi->query("SELECT *FROM ayam WHERE id_ayam='$id_ayam' ");
$detail = $ambil->fetch_assoc();

//   
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
		 <title>Detail Ayam</title>

</head>
<body>
<?php include'menu.php'; ?>
<hr>
<section class="konten">
	<div class="container">
		<div class="row">
			<br>
			<div class="col-md-6">
				<img src="Foto_ayam/<?php  echo $detail["foto_ayam"]; ?>" alt="" class="img-responsive">
			</div>
			<div class="col-md-6">
				<h2><?php echo $detail["nama_ayam"]?></h2>
				<h4>Rp.  <?php echo number_format($detail["harga_ayam"]);?></h4>

				<h5>stok: <?php echo $detail['stok_ayam'];?></h5>
				<form method="post">
					<div class="form-group">
						<div class="input-group">
							<input type="number" min="1" class="form-control "name="jumlah" max="<?php echo $detail['stok_ayam']?>">
							<div class="input-group-btn">
								<button class="btn btn-success bnt-xm" name="beli">Beli</button>
								
							</div>
						</div>
					</div>
				</form>
				<?php
				 if (isset($_POST["beli"]))
				 {
				 	 $jumlah=$_POST["jumlah"];
				 	 $_SESSION["keranjang"][$id_ayam]=$jumlah;

				 	echo "<script>alert('Produk Telah masuk ke keranjang Belanja');</script>";
					echo "<script>location='keranjang.php';</script>";
				 }


				?>
				<p><?php echo $detail["desayam"]; ?></p>
			</div>

			
		</div>
		
	</div>

</section>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>
