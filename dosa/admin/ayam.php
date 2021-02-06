<h2>Data Ayam</h2>
<hr>
	<div class="panel-body">
	    <nav class="nav navbar-nav navbar-right" style="padding-bottom: 10px;">
	    	<a href="index.php?halaman=tambahayam" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i>Tambah Produk</a> 
	    </nav>
	    <br>
	    	<table class="table table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama</th>
						<th>Kategori</th>
						<th >Harga</th>
						<th>Berat</th>
						<th>Foto</th>
						<th>Deskripsi</th>
						<th>Stok</th>
						<th style="width: 15%;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor=1; ?>
					<?php $ambil=$koneksi->query("SELECT *FROM ayam LEFT JOIN kategori ON ayam.id_kategori=kategori.id_kategori"); ?>
					<?php while ($pecah=$ambil->fetch_assoc()){?>

					<tr>
						<td ><?php echo $nomor;?></td>
						<td><?php echo $pecah['nama_ayam'];?></td>
						<td> <?php echo $pecah["nama_kategori"]; ?></td>
						<td>Rp. <?php echo number_format($pecah['harga_ayam']);?>,00</td>
						<td><?php echo $pecah['Berat'];?> gr</td>
						<td>
							<img src="../Foto_ayam/<?php echo $pecah['foto_ayam'];?>" class="img-thumnail" width="200" alt="cinque Terre">
						</td>
						<td><?php echo $pecah["desayam"]; ?></td>
						<td><?php echo $pecah["stok_ayam"]; ?></td>
						<td>
							<a href="index.php?halaman=hapusayam&id=<?php echo $pecah['id_ayam']; ?>" class="btn btn-danger " onlick="return confirm('yakin hapus?')"><i class="glyphicon glyphicon-trash"></i></a>
							<a href="index.php?halaman=ubahayam&id=<?php echo $pecah['id_ayam'];?>" class="btn btn-warning "><i class="glyphicon glyphicon-edit"></i></a>


						</td>
					</tr>
				<?php $nomor++;?>
				<?php } ?>
				</tbody>
			</table>
</div>
