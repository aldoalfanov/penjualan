<div class="container" style="width: 100%; padding-top: 20px;">
	<div class="panel panel-info">
	    <div class="panel-heading">
	    	<i class="fa fa-list"></i> INFORMASI DATA PELANGGAN
	    </div>
<table class="table table-bordered">
	<thead>
		<tr style="background-color: aqua;">
			<th>No.</th>
			<th>Nama Pelanggan</th>
			<th>Jenis Kelamin</th>
			<th>Nomor Telepon</th>
			<th>Alamat</th>
			<th>Aksi</th>
			
		</tr>
	</thead>
		<tbody>
			<?php $nomor=1; ?>
			<?php $ambil=$koneksi->query("SELECT *FROM pelanggan"); ?>
				<?php while ($pecah=$ambil->fetch_assoc()){?>
				<tr>
					<td style="width: 45px;"><?php echo $nomor;?>.</td>
					<td><?php echo $pecah['nama'];?></td>
					<td><?php echo $pecah['jenis_kelamin'];?></td>
					<td><?php echo $pecah['No_telpn'];?></td>
					<td><?php echo $pecah['alamat'];?></td>
					<td style="width: 70px;">
					<a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn-danger btn-sm">Hapus</a>
					</td>
				</tr>
				<?php $nomor++;?>
				<?php } ?>

			</tbody>
</table>
</div>