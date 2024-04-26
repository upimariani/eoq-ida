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
								if ($detail['transaksi']->stat_transaksi == '1') {
								?>

									<a class="btn btn-warning" href="<?= base_url('Supplier/cTransaksi/konfirmasi/' . $detail['transaksi']->id_transaksi) ?>"><i class="far fa-hand-pointer"></i> Konfirmasi Pesanan</a>

								<?php
								}
								?>
								<?php
								if ($detail['transaksi']->stat_transaksi == '2') {
								?>

									<a class="btn btn-info" href="<?= base_url('Supplier/cTransaksi/dikirim/' . $detail['transaksi']->id_transaksi) ?>"><i class="fas fa-shipping-fast"></i> Pesanan Dikirim</a>

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
