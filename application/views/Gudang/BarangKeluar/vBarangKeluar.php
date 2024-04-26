<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-shipping-fast"></i> Barang Keluar</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Barang Keluar</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
		<a href="<?= base_url('Gudang/cBarangKeluar/create') ?>" class="btn btn-app bg-olive">
			<i class="fas fa-shipping-fast"></i> Barang Keluar
		</a>
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
							<h3 class="card-title">Informasi Barang Keluar</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Tanggal / Periode</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($periode as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->tgl_keluar ?></td>
											<td>
												<a href="<?= base_url('Gudang/cBarangKeluar/detail/' . $value->tgl_keluar) ?>" class="btn btn-app bg-teal">
													<i class="fas fa-info"></i> Detail
												</a>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>No.</th>
										<th>Tanggal / Periode</th>
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


<!-- /.modal -->
