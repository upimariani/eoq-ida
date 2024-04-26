<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<h2 class="text-center display-4">Laporan Analisis Barang</h2>
			<form action="<?= base_url('Owner/cLaporan/cetak_bkeluar') ?>" method="POST">
				<div class="row">
					<div class="col-md-10 offset-md-1">


						<a href="<?= base_url('Owner/cLaporanAnalisis/cetak_analisis') ?>" class="btn bg-olive"><i class="far fa-file-alt"></i> Cetak Laporan</a>

					</div>
				</div>
			</form>
		</div>
	</section>
</div>
