<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Invoice</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Invoice</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-8">


					<!-- Main content -->
					<div class="invoice p-3 mb-3">
						<!-- title row -->
						<div class="row">
							<div class="col-12">
								<h4>
									<i class="fas fa-globe"></i> Invoice
									<small class="float-right">Date: <?= date('Y-m-d') ?></small>
								</h4>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								From
								<address>
									<strong>Supplier</strong><br>
									<?= $detail['transaksi']->nama ?><br>
									<?= $detail['transaksi']->alamat ?><br>
									Phone: <?= $detail['transaksi']->no_hp ?>
								</address>
							</div>
						</div>
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Qty</th>
											<th>Barang</th>
											<th>Harga #</th>
											<th>Subtotal</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($detail['barang'] as $key => $value) {
										?>
											<tr>
												<td><?= $value->qty ?></td>
												<td><?= $value->nama_barang ?></td>
												<td>Rp. <?= number_format($value->harga_supplier)  ?></td>
												<td>Rp. <?= number_format($value->harga_supplier * $value->qty)  ?></td>
											</tr>
										<?php
										}
										?>

									</tbody>
								</table>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<div class="row">
							<!-- accepted payments column -->
							<div class="col-6">
								<?php
								if ($detail['transaksi']->stat_transaksi == '0') {
								?>
									<p class="text-muted">Pembayaran:</p>
									<p>Silahkan melakukan pembayaran via transfer bank BRI atas Nama Supplier dengan Nomor Rekening 320912-0121-0121</p>
									<?php echo form_open_multipart('Gudang/cTransaksi/bayar/' . $detail['transaksi']->id_transaksi); ?>
									<input type="file" name="gambar" class="form-control" required>
									<button class="btn bg-olive mt-2" type="submit">Kirim</button>
									</php>
								<?php
								}
								?>
								<?php
								if ($detail['transaksi']->stat_transaksi == '3') {
								?>
									<a class="btn btn-success" href="<?= base_url('Gudang/cTransaksi/diterima/' . $detail['transaksi']->id_transaksi) ?>"><i class="fas fa-thumbs-up"></i> Pesanan Diterima</a>
								<?php
								}
								?>
							</div>
							<!-- /.col -->
							<div class="col-6">
								<div class="table-responsive">
									<table class="table">
										<tr>
											<th>Total:</th>
											<td>Rp. <?= number_format($detail['transaksi']->total_bayar)  ?></td>
										</tr>
									</table>
								</div>
							</div>
							<!-- /.col -->
						</div>

					</div>
					<!-- /.invoice -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>