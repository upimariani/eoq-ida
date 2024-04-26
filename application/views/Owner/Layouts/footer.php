<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-light">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
	<strong>TOKO IDA OLSHOP</strong> Metode Economic Order Quantity


</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('asset/Admin/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('asset/Admin/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?= base_url('asset/Admin/') ?>dist/js/adminlte.js"></script>

<!-- jQuery -->
<script src="<?= base_url('asset/Admin/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('asset/Admin/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('asset/Admin/') ?>plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('asset/Admin/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= base_url('asset/Admin/') ?>dist/js/demo.js"></script> -->
<script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>
<script>
	$(function() {
		$('.select2').select2()
	});
</script>
</body>

</html>