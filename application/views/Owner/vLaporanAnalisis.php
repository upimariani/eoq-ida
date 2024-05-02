<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h2 class="text-center display-4">Laporan Analisis Barang</h2>
			<div class="row">
				<div class="col-md-10 offset-md-1">

					<form action="<?= base_url('Owner/cLaporanAnalisis/cetak_analisis') ?>" method="POST">
						<div class="row">
							<div class="col-md-10 offset-md-1">
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>Barang:</label>
											<select class="select2" name="barang" style="width: 100%;">
												<?php
												foreach ($barang as $key => $value) {
												?>
													<option value="<?= $value->id_barang ?>"><?= $value->nama_barang ?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>

								</div>
								<div class="form-group">
									<div class="input-group input-group-lg">

										<button type="submit" class="btn bg-olive"><i class="far fa-file-alt"></i> Cetak Laporan</button>
									</div>
								</div>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</section>
</div>