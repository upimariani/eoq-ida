<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{

	public function index()
	{
		$this->load->view('Owner/Layouts/head');
		$this->load->view('Owner/Layouts/aside');
		$this->load->view('Owner/vLaporan');
		$this->load->view('Owner/Layouts/footer');
	}
	public function cetak_bkeluar()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'TOKO IDA OLSHOP', 0, 1, 'C');
		$pdf->Cell(190, 10, 'LAPORAN BARANG KELUAR BULAN KE - ' . $bulan . ' TAHUN ' . $tahun, 0, 1, 'C');


		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(45, 7, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(55, 7, 'Nama Barang', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Quantity', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Subtotal', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;

		$data = $this->db->query("SELECT * FROM `barang_keluar` JOIN dbarang_keluar ON barang_keluar.id_bkeluar=dbarang_keluar.id_bkeluar JOIN barang ON barang.id_barang=dbarang_keluar.id_barang WHERE MONTH(tgl_keluar)='" . $bulan . "' AND YEAR(tgl_keluar)='" . $tahun . "'")->result();
		$total = 0;
		foreach ($data as $key => $value) {
			$total += ($value->harga_jual * $value->jumlah);
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(45, 7, $value->tgl_keluar, 1, 0, 'L');
			$pdf->Cell(55, 7, $value->nama_barang, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->jumlah, 1, 0, 'C');
			$pdf->Cell(40, 7, 'Rp.' . number_format($value->harga_jual * $value->jumlah), 1, 1, 'C');
		}

		$pdf->Cell(10, 5, '', 0, 1);
		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(10, 7, '', 0, 0, 'C');
		$pdf->Cell(45, 7, '', 0, 0, 'C');
		$pdf->Cell(55, 7, '', 0, 0, 'C');
		$pdf->Cell(30, 7, 'Total Pendapatan', 0, 0, 'C');
		$pdf->Cell(40, 7, 'Rp.' . number_format($total), 0, 1, 'C');


		$pdf->SetFont('Times', '', 9);
		$pdf->Cell(40, 7, '', 0, 1, 'C');
		$pdf->Cell(40, 7, '', 0, 1, 'C');


		$pdf->Cell(95, 7, 'Mengetahui,', 0, 0, 'C');
		$pdf->Cell(95, 7, 'Kuningan, ' . date('j F Y'), 0, 1, 'C');
		$pdf->Cell(95, 7, 'Owner', 0, 0, 'C');
		$pdf->Cell(95, 7, 'Admin', 0, 1, 'C');
		$pdf->Cell(95, 10, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(95, 7, '(.........................)', 0, 0, 'C');
		$pdf->Cell(95, 7, '(.........................)', 0, 0, 'C');
		$pdf->Output();
	}
}

/* End of file cLaporan.php */
