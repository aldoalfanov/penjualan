
<h2>Data Kategori</h2>
<hr>

<?php
$semuadata =array();
$ambil=$koneksi->query("SELECT *FROM kategori");
while ($tiap =$ambil->fetch_assoc())
{
	$semuadata[]=$tiap;
}
?>
<div class="panel-body">
	    	<nav class="nav navbar-nav navbar-right" style="padding-bottom: 10px;">
	    		<a href="index.php?halaman=tambahkategori" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Data Kategori</a> <br>
	    	</nav>
<table class="table table-bordered">
	<thead>
		<tr style="background-color: aqua;">
			<th>No</th>
			<th>Nama</th>
			<th style="width: 100px;">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($semuadata as $key => $value): ?>
			
		<tr >
			<td style="width: 45px;"><?php echo $key+1 ?> </td>
			<td style="width: 200px;"><?php echo $value["nama_kategori"] ?></td>
			<td>
				<a href="index.php?halaman=hapuskategori&id=<?php echo $value['id_kategori']; ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Hapus</a>

				<a href="index.php?halaman=ubahkategori&id=<?php echo $value['id_kategori']; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i>Ubah</a>

			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
</div>