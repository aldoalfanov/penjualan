<?php include 'koneksi.php'; ?>

<?php 
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM ayam WHERE nama_ayam LIKE '%$keyword%' 
	OR desayam LIKE '%$keyword%'");
while ($pecah=$ambil->fetch_assoc())

{
	$semuadata[]=$pecah;
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
			<title>Pencarian</title>
</head>
<body>
	<?php include 'menu.php'; ?>
	<div class="container">
		<h3>Hasil Pencarian : <?php echo $keyword  ?></h3>
		<?php if(empty($semuadata)) : ?>
			<div class="alert alert-danger">Pencarian <?php echo $keyword  ?> tidak ditemukan</div>

		<?php endif ?>
		<div class="row">
			<?php foreach ($semuadata as $key => $value): ?>
				
			
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="Foto_ayam/<?php echo $value['foto_ayam'] ?>" alt="" class="img-responsive">
					<div class="caption">
						<h3><?php echo $value["nama_ayam"]; ?></h3>
						<h5>Rp. <?php echo number_format($value['harga_ayam']); ?></h5>
							<a href="beli.php?id=<?php echo $value['id_ayam']; ?>" class="btn btn-info">Beli</a>
							<a href="detail.php?id=<?php echo $value["id_ayam"]; ?>"  class=" btn btn-default">Detail</a>
				</div>
			</div>	
		</div>
		<?php endforeach ?>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>