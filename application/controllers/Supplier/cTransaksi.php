<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}
	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->select()
		);
		$this->load->view('Supplier/Layouts/head');
		$this->load->view('Supplier/Layouts/aside');
		$this->load->view('Supplier/Transaksi/vTransaksi', $data);
		$this->load->view('Supplier/Layouts/footer');
	}
	public function detail($id)
	{
		$data = array(
			'detail' => $this->mTransaksi->detail($id)
		);
		$this->load->view('Supplier/Layouts/head');
		$this->load->view('Supplier/Layouts/aside');
		$this->load->view('Supplier/Transaksi/vDetailTransaksi', $data);
		$this->load->view('Supplier/Layouts/footer');
	}
	public function konfirmasi($id)
	{
		$data = array(
			'stat_transaksi' => '2'
		);
		$this->db->where('id_transaksi', $id);
		$this->db->update('transaksi', $data);
		$this->session->set_flashdata('success', 'Pesanan berhasil di konfirmasi!');
		redirect('Supplier/cTransaksi');
	}
	public function dikirim($id)
	{
		$data = array(
			'stat_transaksi' => '3'
		);
		$this->db->where('id_transaksi', $id);
		$this->db->update('transaksi', $data);
		$this->session->set_flashdata('success', 'Pesanan berhasil di dikirim!');
		redirect('Supplier/cTransaksi');
	}
}

/* End of file cTransaksi.php */
