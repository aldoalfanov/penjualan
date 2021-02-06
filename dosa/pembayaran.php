<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='Login.php';</script>";
	exit();

}
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT *FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

$id_pelanggan_beli = $detpem["id_pelanggan"];
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login !== $id_pelanggan_beli)
{
	echo "<script>alert('Ouch salah!');</script>";
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
		<title>Pembayaran</title>
</head>
<body>
	<?php include 'menu.php' ; ?>

	<div class="container">
		<h2>Konfirmasi Pembayaran</h2>
		<p>Kirim Bukti Pembayaran Anda di sini !</p>
		<div class=" alert alert-info">Total tagihan <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?>,00</strong></div>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Penyetor</label>
				<input type="text"  class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>BANK</label>
						<select class="form-control" name="bank">
							<option value="">Pilih Bank</option>
							<option value="Bri">BRI</option>
							<option value="Bni">BNI</option>
							<option value="Bca">BCA</option>
							<option value="Mandiri">MANDIRI</option>
							</div>
						</select>
			</div>
			<div class="form-group">
				<label>Jumlah (Rp)</label>
				<input type="number" class="form-control" name="jumlah" min="1">
			</div>
			<div class="form-group">
				<label>Foto Bukti</label>
				<input type="file" class="form-control" name="bukti">
				<p class="text-danger"> foto bukti harus jpg maksimal 2MB</p>
			</div>
		<button class="btn btn-primary" name="kirim">Kirim</button>
		</form>
		
	</div>
<?php
if (isset($_POST["kirim"]))
{
	$namabukti = $_FILES["bukti"]["nama"];
	$lokasibukti = $_FILES["bukti"]["tmp_name"];
	$namafiks = date("YmdHis").$namabukti;
	move_uploaded_file($lokasibukti, "img/$namafiks");
	$nama = $_POST["nama"];
	$bank = $_POST["bank"];
	$jumlah = $_POST["jumlah"];
	$tanggal = date("Y-m-d");

	$koneksi->query("INSERT INTO pembayaran (id_pembelian,nama,bank,jumlah,tanggal,bukti)
		VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");

	$koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian= '$idpem'");
	echo "<script>alert('TerimaKasih sudah mengirimkan Bukti Pembayaran');</script>";
	echo "<script>location='riwayat.php';</script>";


}
?>

</body>
</html>