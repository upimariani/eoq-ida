<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisis extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAnalisis');
	}

	public function index()
	{
		$data = array(
			'barang' => $this->mAnalisis->barang(),
			'variabel' => $this->mAnalisis->variabel()
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/Analisis/vAnalisis', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
	public function hitung()
	{
		// echo 'Bismillah perhitungan';
		$barang = $this->input->post('barang');
		$periode = $this->input->post('periode');
		$biaya_pemesanan = $this->input->post('biaya_pemesanan');
		$biaya_penyimpanan = $this->input->post('biaya_penyimpanan');


		$jumlah_kebutuhan = $this->db->query("SELECT SUM(total_bayar) as total, barang.id_barang FROM `barang_keluar` JOIN dbarang_keluar ON barang_keluar.id_bkeluar=dbarang_keluar.id_bkeluar JOIN barang ON barang.id_barang=dbarang_keluar.id_barang WHERE barang.id_barang='" . $barang . "' AND YEAR(tgl_keluar)='" . $periode . "'")->row();
		//perhitungan EOQ
		$eoq = round(sqrt((2 * $jumlah_kebutuhan->total * $biaya_pemesanan) / $biaya_penyimpanan));
		// echo $jumlah_kebutuhan->total;
		// echo '<br>' . $eoq;

		//perhitungan ROP
		//300 adalah hari aktif dalam satu tahun
		$ss = $this->input->post('ss');
		$lt = $this->input->post('lt');
		$q = $jumlah_kebutuhan->total / 300;

		$rop = round($ss + ($lt * $q));
		// echo '<br>' . $rop;

		$data = array(
			'id_barang' => $barang,
			'periode' => date('Y-m-d'),
			'tahun' => $periode,
			'eoq' => $eoq,
			'rop' => $rop,
			'biaya_pemesanan' => $biaya_pemesanan,
			'biaya_penyimpanan' => $biaya_penyimpanan,
			'jml_penggunaan' => $jumlah_kebutuhan->total,
			'ss' => $ss,
			'lt' => $lt
		);
		$this->db->insert('analisis', $data);

		//update data barang
		$dt = array(
			'stok_min' => $rop,
			'eoq_in' => $eoq
		);
		$this->db->where('id_barang', $barang);
		$this->db->update('barang', $dt);


		$this->session->set_flashdata('success', 'Analisis berhasil disimpan!');
		redirect('Gudang/cAnalisis');
	}
	public function detail($id_barang)
	{
		$data = array(
			'analisis' => $this->mAnalisis->select($id_barang)
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/Analisis/vDetailAnalisis', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
	public function hapus($id_analisis)
	{
		$this->db->where('id_analisis', $id_analisis);
		$this->db->delete('analisis');
		$this->session->set_flashdata('success', 'Analisis berhasil dihapus!');
		redirect('Gudang/cAnalisis');
	}
}

/* End of file cAnalisis.php */
