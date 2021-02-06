<h2>Detail Pembelian</h2>

<?php
$ambil = $koneksi->query("SELECT *FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan
	WHERE pembelian.id_pembelian='$_GET[id]' ");
$detail = $ambil->fetch_assoc();
?>
<!-- <pre><?php print_r($detail); ?></pre> -->
<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<p>
			Tanggal :<?php echo $detail['tanggal_pembelian']; ?> <br>
			Total :Rp. <?php echo number_format($detail['total_pembelian']); ?><br>
			Status : <?php echo $detail["status_pembelian"]; ?>
		</p>

	</div>
	<div class="col-md-4">
	<h3>Pelanggan</h3>
	<strong><?php echo $detail['nama']; ?></strong> <br>
		<P>
			<?php echo $detail['No_telpn']; ?> <br>
			<?php echo $detail['username'];?> 
		</P>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong>Nama Daerah : <?php echo $detail['nama_daerah']; ?></strong> <br>
		Ongkos Kirim        : Rp.  <?php echo number_format($detail['tarif']); ?> <br>
		Alamat Pengiriman   : <?php echo $detail['alamat_pengirim']; ?> 
	</div>
</div>


<table class="table table-bordered">
	<thead>
		<tr style="background-color: aqua;">
			<th>No</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php 
			$ambil = $koneksi->query("SELECT *FROM pembelian_ayam JOIN ayam ON pembelian_ayam.id_ayam=ayam.id_ayam
				WHERE pembelian_ayam.id_pembelian='$_GET[id]' "); 
		?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $pecah['nama_ayam'];  ?></td>
							<td><?php echo number_format($pecah['harga_ayam']); ?></td>
							<td><?php echo $pecah['jumlah']; ?></td>
							<td>
								Rp. <?php echo number_format($pecah['harga_ayam']* $pecah['jumlah']); ?>
							</td>
								
							

						</tr>
		<?php $nomor++;?>
		<?php } ?>

	</tbody>
</table>
	