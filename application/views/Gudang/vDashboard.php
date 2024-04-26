<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard </h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">


					<div class="card">
						<div class="card-header border-0">
							<h3 class="card-title">Barang</h3>
							<div class="card-tools">
								<a href="#" class="btn btn-tool btn-sm">
									<i class="fas fa-download"></i>
								</a>
								<a href="#" class="btn btn-tool btn-sm">
									<i class="fas fa-bars"></i>
								</a>
							</div>
						</div>
						<div class="card-body table-responsive p-0">
							<table class="table table-striped table-valign-middle">
								<thead>
									<tr>
										<th>Nama Barang</th>
										<th>Economic Order Quantity</th>
										<th>Reorder Point</th>
										<th>Stok Gudang</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($analisis as $key => $value) {
									?>
										<tr>
											<td><?= $value->nama_barang ?></td>
											<td><?= $value->eoq_in ?></td>
											<td><?= $value->stok_min ?></td>
											<?php
											if ($value->stok_gudang < $value->stok_min) {
											?>
												<td>
													<small class="text-danger mr-1">
														<i class="fas fa-arrow-down"></i>
														<?= $value->stok_gudang ?>
													</small>
													Sold
												</td>
											<?php
											} else {
											?>
												<td>
													<small class="text-success mr-1">
														<i class="fas fa-arrow-up"></i>
														<?= $value->stok_gudang ?>
													</small>
													Safe
												</td>
											<?php
											}
											?>
										</tr>

									<?php
									}
									?>

								</tbody>
							</table>
						</div>
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col-md-6 -->

				<!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->