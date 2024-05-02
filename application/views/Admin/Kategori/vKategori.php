<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-store"></i> Kategori</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Kategori</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->

		<button type="button" class="btn btn-app bg-olive" data-toggle="modal" data-target="#modal-default">
			<i class="fas fa-store"></i> Kategori
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
				<div class="col-8">
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
										<th>Nama Kategori</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($kategori as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->nama_kategori ?></td>
											<td>
												<a href="<?= base_url('Admin/cKategori/delete/' . $value->id_kategori) ?>" class="btn btn-app bg-teal">
													<i class="fas fa-trash"></i> Hapus
												</a>
												<button type="button" class="btn btn-app bg-navy" data-toggle="modal" data-target="#edit<?= $value->id_kategori ?>">
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
										<th>Nama Kategori</th>
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
				<h4 class="modal-title">Tambah Data Kategori</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('Admin/cKategori/create') ?>" method="POST">
				<div class="modal-body">
					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Kategori</label><span class="text-danger">*</span>
							<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Kategori" required>
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
foreach ($kategori as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_kategori ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Data Kategori</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('Admin/cKategori/update/' . $value->id_kategori) ?>" method="POST">
					<div class="modal-body">
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Kategori</label><span class="text-danger">*</span>
								<input type="text" value="<?= $value->nama_kategori ?>" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Kategori" required>
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