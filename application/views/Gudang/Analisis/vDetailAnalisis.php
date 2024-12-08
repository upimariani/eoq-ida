<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-shipping-fast"></i> Analisis Kategori Metode EOQ</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Analisis Kategori Metode EOQ</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->

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
							<h3 class="card-title">Informasi Analisis Kategori Metode EOQ</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Kategori</th>
										<th>Periode Analisis</th>
										<th>Bulan</th>
										<th>Tahun</th>
										<th>EOQ</th>
										<th>ROP</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($analisis as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->nama_barang ?></td>
											<td><?php if ($value->bulan == '1') {
													echo 'Januari';
												} else if ($value->bulan == '2') {
													echo 'Februari';
												} else if ($value->bulan == '3') {
													echo 'Maret';
												} else if ($value->bulan == '4') {
													echo 'April';
												} else if ($value->bulan == '5') {
													echo 'Mei';
												} else if ($value->bulan == '6') {
													echo 'Juni';
												} else if ($value->bulan == '7') {
													echo 'Juli';
												} else if ($value->bulan == '8') {
													echo 'Agustus';
												} else if ($value->bulan == '9') {
													echo 'September';
												} else if ($value->bulan == '10') {
													echo 'Oktober';
												} else if ($value->bulan == '11') {
													echo 'November';
												} else if ($value->bulan == '12') {
													echo 'Desember';
												} ?></td>
											<td><?= $value->periode ?></td>
											<td><?= $value->tahun ?></td>
											<td><strong><?= $value->eoq ?></strong><br>
												<span class="badge bg-olive">Jumlah Penggunaan : <?= number_format($value->jml_penggunaan)  ?><br>
													Biaya Pemesanan : Rp. <?= number_format($value->biaya_pemesanan)  ?><br>
													Biaya Penyimpanan : Rp. <?= number_format($value->biaya_penyimpanan)  ?></span>
											</td>
											<td><strong><?= $value->rop ?></strong>
												<br>
												<span class="badge bg-blue">Safety Stock : <?= $value->ss ?><br>
													Lead Time : <?= $value->lt  ?></span>
											</td>
											<td><a href="<?= base_url('Gudang/cAnalisis/hapus/' . $value->id_barang) ?>" class="btn btn-app bg-danger">
													<i class="fas fa-trash"></i> Hapus
												</a></td>

										</tr>
									<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>No.</th>
										<th>Nama Kategori</th>
										<th>Periode Analisis</th>
										<th>Tahun</th>
										<th>EOQ</th>
										<th>ROP</th>
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
