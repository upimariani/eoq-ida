<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporanAnalisis extends CI_Controller
{

	public function index()
	{
		$this->load->view('Owner/Layouts/head');
		$this->load->view('Owner/Layouts/aside');
		$this->load->view('Owner/vLaporanAnalisis');
		$this->load->view('Owner/Layouts/footer');
	}
	public function cetak_analisis()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'TOKO IDA OLSHOP', 0, 1, 'C');
		$pdf->Cell(190, 10, 'LAPORAN ANALISIS BARANG METODE EOQ DAN ROP', 0, 1, 'C');


		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(70, 7, 'Nama Barang', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Periode Analisis', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Tahun Analisis', 1, 0, 'C');
		$pdf->Cell(20, 7, 'EOQ', 1, 0, 'C');
		$pdf->Cell(20, 7, 'ROP', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;

		$data = $this->db->query("SELECT * FROM `analisis` JOIN barang ON barang.id_barang=analisis.id_barang")->result();
		$total = 0;
		foreach ($data as $key => $value) {
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(70, 7, $value->nama_barang, 1, 0, 'L');
			$pdf->Cell(35, 7, $value->periode, 1, 0, 'C');
			$pdf->Cell(30, 7, $value->tahun, 1, 0, 'C');
			$pdf->Cell(20, 7, $value->eoq, 1, 0, 'C');
			$pdf->Cell(20, 7, $value->rop, 1, 1, 'C');
		}



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

/* End of file cLaporanAnalisis.php */
