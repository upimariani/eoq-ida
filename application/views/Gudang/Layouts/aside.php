<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-olive elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?= base_url('asset/admin/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">AdminLTE 3</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('asset/admin/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Gudang</a>
			</div>
		</div>

		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

				<li class="nav-header">DASHBOARD</li>
				<li class="nav-item">
					<a href="<?= base_url('Gudang/cDashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Gudang' && $this->uri->segment(2) == 'cDashboard') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-header">TRANSAKSI</li>
				<li class="nav-item">
					<a href="<?= base_url('Gudang/cTransaksi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Gudang' && $this->uri->segment(2) == 'cTransaksi') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-shopping-cart"></i>
						<p>
							Transaksi
						</p>
					</a>
				</li>
				<li class="nav-header">BARANG</li>
				<li class="nav-item">
					<a href="<?= base_url('Gudang/cBarangKeluar') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Gudang' && $this->uri->segment(2) == 'cBarangKeluar') {
																							echo 'active';
																						}  ?>">
						<i class="nav-icon fas fa-shipping-fast"></i>
						<p>
							Barang Keluar
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Gudang/cAnalisis') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Gudang' && $this->uri->segment(2) == 'cAnalisis') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-chart-pie"></i>
						<p>
							Analisis Barang
						</p>
					</a>
				</li>
				<li class="nav-header">Logout</li>
				<li class="nav-item">
					<a href="<?= base_url('cLogin/logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Logout
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
