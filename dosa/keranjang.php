<?php
session_start();

// echo "<prev>";
// print_r($_SESSION['keranjang']);
// echo "</prev>";

include 'koneksi.php';

if(empty($_SESSION["keranjang"])  OR !isset($_SESSION["keranjang"]))
{

echo "<script>alert('keranjang kosong silahkan Belanja dulu');</script>";
echo "<script>location='index.php';</script>";
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
		<title>Keranjang Belanja</title>
	
</head>
<body>
<?php include'menu.php'; ?>
<section class="konten">
<center><h2>Keranjang Belanja</h2></center>
<hr>
<br>	   
		
		<table class="table table-bordered">
			<thead>
				<tr style="background-color: aqua;">
					<th>No.</th>
					<th>Ayam</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subharga</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php 
					foreach ($_SESSION["keranjang"] as $id_ayam => $jumlah): ?>
				<!-- menampilkan ayam yang sedang di perulangkan berdasarkan id_ayam -->
				<?php
				$ambil = $koneksi->query("SELECT * FROM ayam WHERE id_ayam ='$id_ayam' ");
				$pecah = $ambil->fetch_assoc();
				$subharga=$pecah["harga_ayam"]*$jumlah;

				// echo "<prev>";
				// print_r($pecah);
				// echo "</prev>";
				?>
				<tr style="background-color: lightgray;" >
					<td><?php echo $nomor;?>.</td>
					<td><?php echo $pecah["nama_ayam"];?></td>
					<td><?php echo number_format($pecah["harga_ayam"]);?>,00</td>
					<td><?php echo $jumlah;?></td>
					<td>Rp. <?php echo number_format($subharga); ?>,00</td>
					<td> 
						<a href="hapuskeranjang.php?id=<?php echo $id_ayam ?>" class="btn btn-danger btn-xs"> <i class="glyphicon glyphicon-trash"></i>  Hapus
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php endforeach  ?>
			</tbody>
		</table>
		<br>
		<center>
			<a class="btn btn-success btn-xm" href="index.php"><i class="fa fa-shopping-cart"></i> Lanjut Belanja</a>
			<a class="btn btn-info btn-xm" href="CheckOut.php"> <i class="fa fa-share"></i>  CheckOut</a>
		</center>
	</div>

</section>

</body>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>