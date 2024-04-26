<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
		$this->load->model('mBarang');
	}

	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->select()
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/Transaksi/vTransaksi', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
	public function create()
	{
		$data = array(
			'barang' => $this->mBarang->select(),
			'supplier' => $this->mTransaksi->supplier()
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/Transaksi/vTambahTransaksi', $data);
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
		redirect('Gudang/cTransaksi/create');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('Gudang/cTransaksi/create');
	}
	public function selesai()
	{
		$data = array(
			'id_pengguna' => $this->input->post('supplier'),
			'tgl' => date('Y-m-d'),
			'total_bayar' => $this->cart->total(),
			'stat_pembayaran' => '0',
			'bukti_bayar' => '0',
			'stat_transaksi' => '0'
		);
		$this->mTransaksi->createTransaksi($data);

		//menyimpan data detail transaksi
		$id_transaksi = $this->db->query("SELECT MAX(id_transaksi) as id_transaksi FROM `transaksi`")->row();
		foreach ($this->cart->contents() as $key => $value) {
			$detail = array(
				'id_transaksi' => $id_transaksi->id_transaksi,
				'id_barang' => $value['id'],
				'qty' => $value['qty']
			);
			$this->db->insert('detail_transaksi', $detail);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Data transaksi berhasil disimpan!');
		redirect('Gudang/cTransaksi');
	}
	public function detail($id)
	{
		$data = array(
			'detail' => $this->mTransaksi->detail($id)
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/Transaksi/vDetailTransaksi', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
	public function bayar($id)
	{
		$config['upload_path']          = './asset/pembayaran';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'detail' => $this->mTransaksi->detail($id)
			);
			$this->load->view('Gudang/Layouts/head');
			$this->load->view('Gudang/Layouts/aside');
			$this->load->view('Gudang/Transaksi/vDetailTransaksi', $data);
			$this->load->view('Gudang/Layouts/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'stat_pembayaran' => '1',
				'stat_transaksi' => '1',
				'bukti_bayar' => $upload_data['file_name']
			);
			$this->db->where('id_transaksi', $id);
			$this->db->update('transaksi', $data);
			$this->session->set_flashdata('success', 'Pembayaran berhasil dikirim!');
			redirect('Gudang/cTransaksi', 'refresh');
		}
	}
	public function diterima($id)
	{
		//update stok gudang
		$barang = $this->mTransaksi->detail($id);
		foreach ($barang['barang'] as $key => $value) {
			$stok_sebelumnya = $this->db->query("SELECT * FROM `barang` WHERE id_barang='" . $value->id_barang . "'")->row();
			$a = $stok_sebelumnya->stok_gudang;
			$b = $value->qty;
			$c = $a + $b;
			$s = array(
				'stok_gudang' => $c
			);
			$this->db->where('id_barang', $value->id_barang);
			$this->db->update('barang', $s);
		}
		$data = array(
			'stat_transaksi' => '4'
		);
		$this->db->where('id_transaksi', $id);
		$this->db->update('transaksi', $data);
		$this->session->set_flashdata('success', 'Pesanan berhasil di diterima!');
		redirect('Gudang/cTransaksi');
	}
}

/* End of file cTransaksi.php */
