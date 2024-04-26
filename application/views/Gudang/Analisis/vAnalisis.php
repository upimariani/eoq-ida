<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><i class="fas fa-shipping-fast"></i> Analisis Barang Metode EOQ</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Analisis Barang Metode EOQ</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
		<button type="button" class="btn btn-app bg-olive" data-toggle="modal" data-target="#modal-default">
			<i class="fas fa-shipping-fast"></i> Analisis Barang Metode EOQ
		</button>
		<div class="modal fade" id="modal-default">
			<div class="modal-dialog">
				<form action="<?= base_url('Gudang/cAnalisis/Hitung') ?>" method="POST">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Masukkan Data Variabel Perhitungan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Barang</label>
								<select name="barang" class="form-control" required>
									<option value="">---Pilih Nama Barang---</option>
									<?php
									foreach ($variabel['barang'] as $key => $value) {
									?>
										<option value="<?= $value->id_barang ?>"><?= $value->nama_barang ?></option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Tahun Periode</label>
								<select name="periode" class="form-control" required>
									<option value="">---Pilih Nama Barang---</option>
									<?php
									foreach ($variabel['periode'] as $key => $value) {
									?>
										<option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Biaya Pemesanan per Periode</label>
								<input type="number" name="biaya_pemesanan" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Biaya Pemesanan">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Biaya Penyimpanan</label>
								<input type="number" name="biaya_penyimpanan" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Biaya Penyimpanan">
							</div>
							<hr>
							<div class="form-group">
								<label for="exampleInputEmail1">Safety Stock</label>
								<input type="number" name="ss" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Jumlah Safety Stock">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Lead Time</label>
								<input type="number" name="lt" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Lead Time">
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn bg-olive">Save changes</button>
						</div>
					</div>
				</form>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
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
							<h3 class="card-title">Informasi Analisis Barang Metode EOQ</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Barang</th>
										<th>Kategori</th>
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
											<td><?= $value->nama_barang ?></td>
											<td><?= $value->nama_kategori ?></td>
											<td>
												<a href="<?= base_url('Gudang/cAnalisis/detail/' . $value->id_barang) ?>" class="btn btn-app bg-teal">
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
										<th>Nama Barang</th>
										<th>Kategori</th>
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