<?php
session_start();

include 'koneksi.php';
if (!isset($_SESSION["pelanggan"]))
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='Login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	
		<meta charset="utf-8" />
		 <meta name="viewport" content="width=device-width, insert_idial-scale=1.0" />
		 <!-- BOOTSTRAP STYLES-->
		 <link href="assets/css/bootstrap.css" rel="stylesheet" />
		 <!-- FONTAWESOME STYLES-->
		 <link href="assets/css/font-awesome.css" rel="stylesheet" />
		  <!-- CUSTOM STYLES-->
		 <link href="assets/css/custom.css" rel="stylesheet" />
		  <!-- GOOGLE FONTS-->
	  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
		  <title>CheckOut</title>
</head>
<body>

<?php include'menu.php'; ?>

<center><h2>TOKO AYAM MUTU</h2></center>
<hr>
		
		<table class="table table-bordered">
			<thead>
				<tr style="background-color: aqua;">
					<th>No.</th>
					<th>Nama Ayam</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subharga</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php $totalbelanja=0; ?>
				<?php 
					error_reporting(0);
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
				<tr style="background-color: gray;">
					<td style="width: 45px;"><?php echo $nomor;?>.</td>
					<td><?php echo $pecah["nama_ayam"];?></td>
					<td> Rp. <?php echo number_format($pecah["harga_ayam"]); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
				</tr>
				<?php $nomor++; ?>
				<?php $totalbelanja+=$subharga; ?>
				<?php endforeach  ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4">Total Belanja</th>
					<th>Rp. <?php echo number_format($totalbelanja) ?></th>

				</tr>
				
			</tfoot>
		</table>
			<form method="post">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama'] ?>" class="form-control"> 	
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['No_telpn'] ?>" class="form-control">
						</div>
					</div>
						
					<div class="col-md-4">
						<select class="form-group"  name="id_ongkir">
							<option value="">Pilih Ongkos Kirim</option>
								<?php
		 						$ambil= $koneksi->query("SELECT * FROM ongkir");
								while($perongkir =$ambil->fetch_assoc()){
								?>
								<option value="<?php echo $perongkir["id_ongkir"] ?>">
									<?php echo $perongkir['nama_daerah'] ?> -
									Rp.  <?php echo number_format($perongkir['tarif']) ?> 

								</option>
								<?php } ?>
							</select> 
							
					</div>
					
				</div>
				<div class="form-group">
					<label>Alamat Lengkap Pengiriman</label>
					<textarea class="form-control" name="alamat_pengirim" placeholder="masukan alamat Lengkap Pengiriman"></textarea>
				</div>
				<center>
				<button class="btn btn-info btn-xm" name="checkOut"><i class="glyphicon glyphicon-share"></i>CheckOut</a></button>
				</center>
			</form>
			<?php

			if (isset($_POST["checkOut"]))
			{
				
				$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
				$id_ongkir= $_POST["id_ongkir"];
				$tanggal_pembelian = date("y-m-d");
				$alamat_pengirim= $_POST['alamat_pengirim'];

				$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir' ");
				$arrayongkir = $ambil->fetch_assoc();
				$nama_daerah = $arrayongkir['nama_daerah'];
				$tarif = $arrayongkir['tarif'];

				$total_pembelian = $totalbelanja + $tarif;


					// meyimpan data ke tabel pembelian
				$koneksi->query("INSERT INTO pembelian(id_pelanggan,id_ongkir, tanggal_pembelian,total_pembelian,nama_daerah,tarif,alamat_pengirim)
				VALUES('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian','$total_pembelian','$nama_daerah','$tarif','$alamat_pengirim') ");



				// menyimpan id_pembelian barusan terjadi

				$id_pembelian_barusan = $koneksi->insert_id;
				foreach ($_SESSION["keranjang"] as $id_ayam => $jumlah)
				 {
					// mendapatkan data ayam berdasarkan id_ayam
					$ambil=$koneksi->query("SELECT *FROM ayam WHERE id_ayam='$id_ayam'");
					$perayam=$ambil->fetch_assoc();
					$nama= $perayam['nama_ayam'];
					$harga=$perayam['harga_ayam'];
					$berat=$perayam['Berat'];
					$subberat=$perayam['Berat']*$jumlah;
					$subharga=$perayam['harga_ayam']*$jumlah;
					$koneksi->query("INSERT INTO pembelian_ayam (id_pembelian, id_ayam,nama,harga,berat,subberat,subharga, jumlah)
					VALUES('$id_pembelian_barusan','$id_ayam','$nama','$harga','$berat','$subberat','$subharga', '$jumlah')");


					$koneksi->query("UPDATE ayam SET stok_ayam=stok_ayam -$jumlah WHERE id_ayam='$id_ayam' ");
				}

				unset($_SESSION["keranjang"]);


				echo "<script>alert('pembelian sukses');</script>";
				echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
		
			}
			?>
	</div>
	</div>
</section> 
<!-- <prev><?php print_r($_SESSION['pelanggan'])  ?></prev>
<prev><?php print_r($_SESSION["keranjang"])  ?></prev>  
</body>     -->
</body>
</html>
</div>
