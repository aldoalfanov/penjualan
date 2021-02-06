
<div class="container" style="width: 100%; padding-top: 20px;">
	<div class="panel panel-default">
	    <div class="panel-heading">
	    	<i class="fa fa-list"></i> INFORMASI DATA PEMBELIAN
	    </div>

<table class="table table-bordered">
	<thead>
		<tr style="background-color: aqua;">
			<th>No.</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Status</th>
			<th>Total</th>
			<th>Aksi</th>
			
		</tr>
	</thead>
		<tbody>
				<?php $nomor=1; ?>
				<?php $ambil= $koneksi->query("SELECT *FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");?>
				<?php while ($pecah=$ambil->fetch_assoc()) { ?>
					<tr>
						<td><?php echo $nomor; ?>.</td>
						<td><?php echo $pecah['nama'];?></td>
						<td><?php echo $pecah['tanggal_pembelian'];?></td>
						<td><?php echo $pecah['status_pembelian']; ?> </td>
						<td>Rp. <?php echo number_format($pecah['total_pembelian']);?></td>
						<td>
							<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian'];?>" class="btn btn-info btn-xs">Detail</a>
						<?php if ($pecah['status_pembelian']!=="pending") : ?>
							<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian']?>" class="btn btn-success btn-xs">Pembayaran</a>
						<?php endif ?>
						</td>
					</tr>
					<?php $nomor++;?>
					<?php } ?>

		</tbody>
</table>