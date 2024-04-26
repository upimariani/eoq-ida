<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h2 class="text-center display-4">Laporan Barang Keluar</h2>
			<form action="<?= base_url('Owner/cLaporan/cetak_bkeluar') ?>" method="POST">
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<div class="row">

							<div class="col-6">
								<div class="form-group">
									<label>Periode Bulan:</label>
									<select class="select2" name="bulan" style="width: 100%;">
										<option value="1" selected>1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
									</select>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Tahun:</label>
									<select class="select2" name="tahun" style="width: 100%;">
										<option selected>Tahun</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
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
	</section>
</div>