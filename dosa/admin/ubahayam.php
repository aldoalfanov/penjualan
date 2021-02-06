
<h2> UBAH AYAM</h2>
<hr>

<?php


$ambil= $koneksi->query("SELECT *FROM  ayam WHERE id_ayam='$_GET[id]'");

$pecah = $ambil->fetch_assoc();


// echo "<prev>";
// 	print_r($pecah);
// echo "</prev>";

?>


<?php

$datakategori = array();
$ambil=$koneksi->query("SELECT *FROM kategori");

while ($tiap =$ambil->fetch_assoc())
{
	$datakategori[]=$tiap;
}

?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kategori</label>
		<select class="form-control" name="id_kategori">
			<option value="">Pilih  Kategori</option>
			<?php foreach ($datakategori as $key => $value): ?>

			<option value="<?php echo $value["id_kategori"] ?>" 
				<?php if($pecah["id_kategori"]==$value["id_kategori"]){echo "selected";} ?> >
				<?php echo $value["nama_kategori"] ?>
					
			</option>
			<?php endforeach ?>
		</select>
	<div class="form-group">
		<label>Nama Ayam</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_ayam']; ?>">
		
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_ayam']; ?>">
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" class="form-control" name="berat"value="<?php echo $pecah['Berat']; ?>">
	</div>
	<div class="form-group">
		<img src="../Foto_ayam/<?php echo $pecah['foto_ayam'];?>" width="100">
		
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" class="form-control" name="stok">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea  class="form-control" name="deskripsi" rows="10">
		<?php echo $pecah['desayam']; ?>
		</textarea>
		
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php 
if (isset($_POST['ubah']))
{
	$namafoto =$_FILES['foto']['name'];
	$lokasifoto =$_FILES['foto']['tmp_name'];

	if (!empty($lokasifoto))
	{


	move_uploaded_file($lokasifoto, "../Foto_ayam/.$namafoto");

	$koneksi->query("UPDATE ayam SET nama_ayam='$_POST[nama]',harga_ayam='$_POST[harga]',Berat='$_POST[berat]',foto_ayam='$namafoto',stok_ayam='$_POST[stok]',desayam='$_POST[deskripsi]',id_kategori='$_POST[id_kategori]'
	 WHERE id_ayam='$_GET[id]'");
	}
	
	else
	{

	$koneksi->query("UPDATE ayam SET nama_ayam='$_POST[nama]',
		harga_ayam='$_POST[harga]',Berat='$_POST[berat]',stok_ayam='$_POST[stok]',
		desayam='$_POST[deskripsi]',id_kategori='$_POST[id_kategori]' WHERE id_ayam='$_GET[id]'");
	}


	echo "<script>alert('data ayam telah di ubah');</script>";
	echo "<script>location='index.php?halaman=ayam';</script>";
}
?>