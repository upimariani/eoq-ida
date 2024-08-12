<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-barcode"></i> Barang</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Barang</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->

		<button type="button" class="btn btn-app bg-olive" data-toggle="modal" data-target="#modal-default">
			<i class="fas fa-barcode"></i> Barang
		</button>
		<?php
		if ($this->session->userdata('success') != '') {
		?>
			<div class="callout callout-success">
				<h5>Sukses!</h5>

				<p><?= $this->session->userdata('success') ?></p>
			</div>
		<?php
		}
		?>

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Barang</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Barang</th>
										<th>Keterangan</th>
										<th>Harga Jual</th>
										<th>Harga Supplier</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($barang as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td class="text-center"><img style="width: 100px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>"><br><?= $value->nama_barang ?><br>
												<strong><?= $value->nama_kategori ?></strong><br>
												<small>Biaya Pemesanan : <strong>Rp. <?= number_format($value->biaya_pemesanan)  ?></strong></small><br>
												<small>Biaya Penyimpanan : <strong>Rp. <?= number_format($value->biaya_penyimpanan) ?></strong></small>
											</td>
											<td><?= $value->keterangan ?></td>
											<td>Rp. <?= number_format($value->harga_jual)  ?></td>
											<td>Rp. <?= number_format($value->harga_supplier)  ?></td>
											<td>
												<a href="<?= base_url('Admin/cBarang/delete/' . $value->id_barang) ?>" class="btn btn-app bg-teal">
													<i class="fas fa-trash"></i> Hapus
												</a>
												<button type="button" class="btn btn-app bg-navy" data-toggle="modal" data-target="#edit<?= $value->id_barang ?>">
													<i class="fas fa-edit"></i> Edit
												</button>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>No.</th>
										<th>Nama Barang</th>
										<th>Keterangan</th>
										<th>Harga Jual</th>
										<th>Harga Supplier</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->


					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Data Barang</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php echo form_open_multipart('Admin/cBarang/create'); ?>
			<div class="modal-body">
				<div class="card-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Kategori</label><span class="text-danger">*</span>
						<select class="form-control" name="kategori">
							<option value="">---Pilih Kategori---</option>
							<?php
							foreach ($kategori as $key => $value) {
							?>
								<option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Barang</label><span class="text-danger">*</span>
						<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Barang" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Keterangan</label><span class="text-danger">*</span>
						<input type="text" name="keterangan" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Keterangan" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Harga Supplier</label><span class="text-danger">*</span>
						<input type="number" name="harga_supplier" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga Supplier" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Harga Jual</label><span class="text-danger">*</span>
						<input type="number" name="harga_jual" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga Jual" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Gambar</label><span class="text-danger">*</span>
						<input type="file" name="gambar" class="form-control" id="exampleInputEmail1" required>
					</div>
					<hr>
					<div class="form-group">
						<label for="exampleInputEmail1">Biaya Pemesanan</label><span class="text-danger">*</span>
						<input type="number" name="biaya_pemesanan" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Biaya Pemesanan" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Biaya Penyimpanan</label><span class="text-danger">*</span>
						<input type="number" name="biaya_penyimpanan" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Biaya Penyimpanan" required>
					</div>

				</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn bg-olive">Save changes</button>
			</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<?php
foreach ($barang as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_barang ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Data Barang</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php echo form_open_multipart('Admin/cBarang/update/' . $value->id_barang); ?>
				<div class="modal-body">
					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Kategori</label><span class="text-danger">*</span>
							<select class="form-control" name="kategori">
								<option value="">---Pilih Barang---</option>
								<?php
								foreach ($kategori as $key => $item) {
								?>
									<option value="<?= $item->id_kategori ?>" <?php if ($value->id_kategori == $item->id_kategori) {
																					echo 'selected';
																				} ?>><?= $item->nama_kategori ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Kategori</label><span class="text-danger">*</span>
							<input type="text" name="nama" value="<?= $value->nama_barang ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Barang" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Keterangan</label><span class="text-danger">*</span>
							<input type="text" name="keterangan" value="<?= $value->keterangan ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Keterangan" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Harga Supplier</label><span class="text-danger">*</span>
							<input type="number" name="harga_supplier" value="<?= $value->harga_supplier ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga Supplier" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Harga Jual</label><span class="text-danger">*</span>
							<input type="number" name="harga_jual" value="<?= $value->harga_jual ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga Jual" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Gambar</label><span class="text-danger">*</span><br>
							<img style="width: 100px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>">
							<input type="file" name="gambar" class="form-control" id="exampleInputEmail1">
						</div>
						<hr>
						<div class="form-group">
							<label for="exampleInputEmail1">Biaya Pemesanan</label><span class="text-danger">*</span>
							<input type="number" value="<?= $value->biaya_pemesanan ?>" name="biaya_pemesanan" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Biaya Pemesanan" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Biaya Penyimpanan</label><span class="text-danger">*</span>
							<input type="number" value="<?= $value->biaya_penyimpanan ?>" name="biaya_penyimpanan" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Biaya Penyimpanan" required>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn bg-olive">Save changes</button>
				</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
<?php
}
?>

<!-- /.modal -->