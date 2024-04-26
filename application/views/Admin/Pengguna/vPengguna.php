<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="far fa-user"></i> Pengguna</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Penggguna</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->

		<button type="button" class="btn btn-app bg-olive" data-toggle="modal" data-target="#modal-default">
			<i class="fas fa-user-plus"></i> Pengguna
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
							<h3 class="card-title">Informasi Pengguna</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th>Nomor Telepon</th>
										<th>Akun</th>
										<th>Level Pengguna</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($pengguna as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->nama ?></td>
											<td><?= $value->alamat ?></td>
											<td><?= $value->no_hp ?></td>
											<td><?= $value->username ?> | <?= $value->password ?></td>
											<td><?php if ($value->level_pengguna == '1') {
												?>
													<span class="badge badge-success">Admin</span>
												<?php
												} else if ($value->level_pengguna == '2') {
												?>
													<span class="badge badge-warning">Gudang</span>
												<?php
												} else if ($value->level_pengguna == '3') {
												?>
													<span class="badge badge-info">Supplier</span>
												<?php
												} else if ($value->level_pengguna == '4') {
												?>
													<span class="badge badge-danger">Pemilik</span>
												<?php
												} ?>
											</td>
											<td>
												<a href="<?= base_url('Admin/cPengguna/delete/' . $value->id_pengguna) ?>" class="btn btn-app bg-teal">
													<i class="fas fa-trash"></i> Hapus
												</a>
												<button type="button" class="btn btn-app bg-navy" data-toggle="modal" data-target="#edit<?= $value->id_pengguna ?>">
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
										<th>Nama</th>
										<th>Alamat</th>
										<th>Nomor Telepon</th>
										<th>Akun</th>
										<th>Level Pengguna</th>
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
				<h4 class="modal-title">Tambah Data Pengguna</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('Admin/cPengguna/create') ?>" method="POST">
				<div class="modal-body">
					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Pengguna</label><span class="text-danger">*</span>
							<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Pengguna" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Alamat</label><span class="text-danger">*</span>
							<textarea class="form-control" name="alamat" id="exampleInputPassword1" placeholder="Masukkan Alamat" required></textarea>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Nomor Telepon</label><span class="text-danger">*</span>
							<input type="text" class="form-control" name="no_hp" id="exampleInputEmail1" placeholder="Masukkan Nomor Telepon" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Username</label><span class="text-danger">*</span>
							<input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Masukkan Username" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label><span class="text-danger">*</span>
							<input type="text" class="form-control" name="password" id="exampleInputEmail1" placeholder="Masukkan Password" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Level Pengguna</label><span class="text-danger">*</span>
							<select name="level" class="form-control" required>
								<option value="">---Pilih Level Pengguna---</option>
								<option value="1">Admin</option>
								<option value="2">Gudang</option>
								<option value="3">Supplier</option>
								<option value="4">Owner</option>
							</select>
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
foreach ($pengguna as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_pengguna ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Data Pengguna</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('Admin/cPengguna/update/' . $value->id_pengguna) ?>" method="POST">
					<div class="modal-body">
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Pengguna</label><span class="text-danger">*</span>
								<input type="text" name="nama" value="<?= $value->nama ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Pengguna" required>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Alamat</label><span class="text-danger">*</span>
								<textarea class="form-control" name="alamat" id="exampleInputPassword1" placeholder="Masukkan Alamat" required><?= $value->alamat ?></textarea>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Nomor Telepon</label><span class="text-danger">*</span>
								<input type="text" class="form-control" name="no_hp" value="<?= $value->no_hp ?>" id="exampleInputEmail1" placeholder="Masukkan Nomor Telepon" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Username</label><span class="text-danger">*</span>
								<input type="text" class="form-control" name="username" value="<?= $value->username ?>" id="exampleInputEmail1" placeholder="Masukkan Username" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Password</label><span class="text-danger">*</span>
								<input type="text" class="form-control" name="password" value="<?= $value->password ?>" id="exampleInputEmail1" placeholder="Masukkan Password" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Level Pengguna</label><span class="text-danger">*</span>
								<select name="level" class="form-control" required>
									<option value="">---Pilih Level Pengguna---</option>
									<option value="1" <?php if ($value->level_pengguna == '1') {
															echo 'selected';
														} ?>>Admin</option>
									<option value="2" <?php if ($value->level_pengguna == '2') {
															echo 'selected';
														} ?>>Gudang</option>
									<option value="3" <?php if ($value->level_pengguna == '3') {
															echo 'selected';
														} ?>>Supplier</option>
									<option value="4" <?php if ($value->level_pengguna == '4') {
															echo 'selected';
														} ?>>Owner</option>
								</select>
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