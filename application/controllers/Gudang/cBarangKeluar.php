<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBarangKeluar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBarangKeluar');
		$this->load->model('mBarang');
	}

	public function index()
	{
		$data = array(
			'periode' => $this->mBarangKeluar->periode()
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/BarangKeluar/vBarangKeluar', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
	public function create()
	{
		$data = array(
			'barang' => $this->mBarang->select()
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/BarangKeluar/vTambahBKeluar', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
	public function addtocart()
	{
		$data = array(
			'id' => $this->input->post('barang'),
			'name' => $this->input->post('nama'),
			'price' => $this->input->post('harga'),
			'qty' => $this->input->post('qty')
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Barang berhasil masuk keranjang!');
		redirect('Gudang/cBarangKeluar/create');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('Gudang/cBarangKeluar/create');
	}
	public function selesai()
	{
		$data = array(
			'tgl_keluar' => date('Y-m-d'),
			'total_bayar' => $this->cart->total()
		);
		$this->db->insert('barang_keluar', $data);

		//mengurangi quantity barang
		foreach ($this->cart->contents() as $key => $value) {
			$barang = $this->db->query("SELECT * FROM `barang` WHERE id_barang='" . $value['id'] . "'")->row();
			$a = $barang->stok_gudang;
			$b = $value['qty'];
			$c = $a - $b;

			$stok = array(
				'stok_gudang' => $c
			);
			$this->db->where('id_barang', $value['id']);
			$this->db->update('barang', $stok);
		}


		//menyimpan data detail barang keluar
		$id_keluar = $this->db->query("SELECT MAX(id_bkeluar) as id FROM `barang_keluar`")->row();
		foreach ($this->cart->contents() as $key => $value) {
			$detail = array(
				'id_bkeluar' => $id_keluar->id,
				'id_barang' => $value['id'],
				'jumlah' => $value['qty']
			);
			$this->db->insert('dbarang_keluar', $detail);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Data transaksi berhasil disimpan!');
		redirect('Gudang/cBarangKeluar');
	}
	public function detail($tgl)
	{
		$data = array(
			'barang' => $this->mBarangKeluar->select($tgl)
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/BarangKeluar/vDetailBarangKeluar', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
}

/* End of file cBarangKeluar.php */
