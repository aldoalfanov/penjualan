<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php
	include 'koneksi.php';
	$query = mysqli_query($koneksi, "SELECT id_admin FROM admin");
	$ambil = mysqli_fetch_array($query);
	$id = $ambil['id_admin'];
	$query = mysqli_query($koneksi, "SELECT nama_lengkap FROM admin WHERE id_admin='$id'");
	$data_nama = mysqli_fetch_array($query);
?>
<body>
	<div class="container" style="width: 100%; padding-top: 20px;">
	  <div class="panel panel-danger">
	    <div class="panel-heading"><i class="fa fa-user"></i> Admin : <?php echo $data_nama['nama_lengkap']; ?></div>
	    <div class="panel-body"><h2>Selamat Datang Di Panel Admin</h2></div>
	  </div>
	</div>
</body>
</html>