<?php

$semudata = array();
$ambil=$koneksi->query("SELECT *FROM kategori");

while ($tiap =$ambil->fetch_assoc())
{
	$semudata[]=$tiap;
}

?>
<h2>Tambah Data Kategori</h2>


<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" class="form-control" name="nama">
	 </div>
		<button class="btn btn-success btn-xm" name="save">simpan</button>
	
</form>

<?php 

if (isset($_POST['save']))
{

$namakategori=$_POST['nama'];
	
	$koneksi->query("INSERT INTO kategori (id_kategori,nama_kategori)
	values('','$namakategori')");
	



	echo "<div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";

// echo "<pre>";
// print_r($_FILES["foto"]);
// echo "</pre>";
}
?>

