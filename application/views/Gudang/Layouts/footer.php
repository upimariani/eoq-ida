<!-- Control Sidebar -->



<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('asset/Admin/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('asset/Admin/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?= base_url('asset/Admin/') ?>dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url('asset/Admin/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= base_url('asset/Admin/') ?>dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('asset/Admin/') ?>dist/js/pages/dashboard3.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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
	console.log = function() {}
	$("#barang").on('change', function() {

		$(".nama").html($(this).find(':selected').attr('data-nama'));
		$(".nama").val($(this).find(':selected').attr('data-nama'));


		$(".harga").html($(this).find(':selected').attr('data-harga'));
		$(".harga").val($(this).find(':selected').attr('data-harga'));

	});
</script>
<script>
	console.log = function() {}
	$("#dt-barang").on('change', function() {

		$(".pemesanan").html($(this).find(':selected').attr('data-pemesanan'));
		$(".pemesanan").val($(this).find(':selected').attr('data-pemesanan'));


		$(".penyimpanan").html($(this).find(':selected').attr('data-penyimpanan'));
		$(".penyimpanan").val($(this).find(':selected').attr('data-penyimpanan'));

	});
</script>
</body>

</html>