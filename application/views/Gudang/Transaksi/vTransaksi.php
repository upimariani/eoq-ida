<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-shopping-cart"></i> Transaksi Barang Supplier</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Kategori</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->

		<a href="<?= base_url('Gudang/cTransaksi/create') ?>" class="btn btn-app bg-olive">
			<i class="fas fa-shopping-cart"></i> Transaksi
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
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Transaksi Supplier</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Supplier</th>
										<th>Tanggal</th>
										<th>Total Pembayaran</th>
										<th>Status Transaksi</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($transaksi as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->nama ?></td>
											<td><?= $value->tgl ?></td>
											<td>Rp. <?= number_format($value->total_bayar)  ?></td>
											<td><?php if ($value->stat_transaksi == '0') {
												?>
													<span class="badge badge-danger">Belum Bayar</span>
												<?php
												} else if ($value->stat_transaksi == '1') {
												?>
													<span class="badge badge-warning">Menunggu Konfirmasi</span>
												<?php
												} else if ($value->stat_transaksi == '2') {
												?>
													<span class="badge badge-info">Pesanan Diproses</span>
												<?php
												} else if ($value->stat_transaksi == '3') {
												?>
													<span class="badge badge-primary">Pesanan Dikirim</span>
												<?php
												} else if ($value->stat_transaksi == '4') {
												?>
													<span class="badge badge-success">Pesanan Selesai</span>
												<?php
												} ?>
											</td>
											<td>
												<a href="<?= base_url('Gudang/cTransaksi/detail/' . $value->id_transaksi) ?>" class="btn btn-app bg-teal">
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
										<th>Nama Supplier</th>
										<th>Tanggal</th>
										<th>Total Pembayaran</th>
										<th>Status Transaksi</th>
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
