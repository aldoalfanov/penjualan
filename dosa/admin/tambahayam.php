<?php

$datakategori = array();
$ambil=$koneksi->query("SELECT *FROM kategori");

while ($tiap =$ambil->fetch_assoc())
{
	$datakategori[]=$tiap;
}

?>
<h2>Tambah Produk</h2>


<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="id_kategori">
			<option value="">Pilih  Kategori</option>
			<?php foreach ($datakategori as $key => $value): ?>

			<option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
		
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga">
		
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" class="form-control" name="berat">
		
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" class="form-control" name="stok">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea  class="form-control" name="deskripsi" rows="10"></textarea>
		
	</div>
	<div class="form-group">
		<label>Foto</label>
			<input type="file" class="form-control" name="foto">
	</div>
	<br>
	<button class="btn btn-success btn-xm" name="save">simpan</button>
	
</form>

<?php 
if (isset($_POST['save']))
{
	$nama =$_FILES['foto']['name'];
	$lokasi =$_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../Foto_ayam/".$nama);
	
	$koneksi->query("INSERT INTO ayam (nama_ayam,harga_ayam,Berat,foto_ayam,stok_ayam,desayam,id_kategori)
	values('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[stok]','$_POST[deskripsi]','$_POST[id_kategori]')");
	



	echo "<div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=ayam'>";

// echo "<pre>";
// print_r($_FILES["foto"]);
// echo "</pre>";
}
?>




