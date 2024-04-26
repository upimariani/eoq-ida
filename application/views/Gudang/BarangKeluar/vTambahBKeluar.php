<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Barang Keluar</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Barang Keluar</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
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
			<div class="row">
				<!-- left column -->
				<div class="col-md-6">
					<!-- jquery validation -->
					<div class="card card-bg-olive">
						<div class="card-header">
							<h3 class="card-title">Barang <small>Keluar</small></h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form id="quickForm" action="<?= base_url('Gudang/cBarangKeluar/addtocart') ?>" method="post">
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Barang</label>
									<select id="barang" name="barang" class="form-control" required>
										<option>---Pilih Barang---</option>
										<?php
										foreach ($barang as $key => $value) {
										?>
											<option data-harga="<?= $value->harga_jual ?>" data-nama="<?= $value->nama_barang ?>" value="<?= $value->id_barang ?>"><?= $value->nama_barang ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Harga</label>
									<input type="text" name="harga" class="harga form-control" id="exampleInputPassword1" placeholder="Harga Jual" readonly>
									<input type="hidden" name="nama" class="nama form-control" id="exampleInputPassword1" placeholder="Harga Supplier" readonly>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Quantity</label>
									<input type="number" name="qty" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Quantity" required>
								</div>

							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</form>
					</div>
					<!-- /.card -->
				</div>
				<div class="col-md-6">
					<!-- jquery validation -->
					<div class="card card-bg-olive">
						<div class="card-header">
							<h3 class="card-title">Keranjang <small>Barang Keluar</small></h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<table class="table table-bordered">
							<thead>
								<tr>
									<th style="width: 10px">#</th>
									<th>Nama Barang</th>
									<th>Harga</th>
									<th style="width: 40px">Quantity</th>
									<th>Subtotal</th>
									<th style="width: 20px">Hapus</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($this->cart->contents() as $key => $value) {
								?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $value['name'] ?></td>
										<td>Rp. <?= number_format($value['price']) ?></td>
										<td><?= $value['qty'] ?> x</td>
										<td>Rp. <?= number_format($value['price'] * $value['qty'])  ?></td>
										<td class="text-center"><a href="<?= base_url('Gudang/cBarangKeluar/delete/' . $value['rowid']) ?>"><i class="fas fa-trash"></i></a></td>
									</tr>
								<?php
								}
								?>
							</tbody>
							<tfoot>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>Total</td>
									<td colspan="2">Rp. <?= number_format($this->cart->total())  ?></td>
								</tr>
							</tfoot>
						</table>
						<a href="<?= base_url('Gudang/cBarangKeluar/selesai') ?>" class="btn btn-success mt-3"><i class="fas fa-hand-point-right"></i> Selesai</a>
					</div>
					<!-- /.card -->
				</div>
				<!--/.col (left) -->
				<!-- right column -->
				<div class="col-md-6">

				</div>
				<!--/.col (right) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
