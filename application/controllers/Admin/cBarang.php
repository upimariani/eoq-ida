<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBarang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBarang');
		$this->load->model('mKategori');
	}

	public function index()
	{
		$data = array(
			'barang' => $this->mBarang->select(),
			'kategori' => $this->mKategori->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Barang/vBarang', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function create()
	{
		$config['upload_path']          = './asset/foto-produk';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'error' => $this->upload->display_errors(),
				'barang' => $this->mBarang->select()
			);
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/aside');
			$this->load->view('Admin/Barang/vBarang', $data);
			$this->load->view('Admin/Layouts/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'id_kategori' => $this->input->post('kategori'),
				'nama_barang' => $this->input->post('nama'),
				'keterangan' => $this->input->post('keterangan'),
				'harga_supplier' => $this->input->post('harga_supplier'),
				'harga_jual' => $this->input->post('harga_jual'),
				'gambar' => $upload_data['file_name']
			);
			$this->mBarang->create($data);
			$this->session->set_flashdata('success', 'Data barang Berhasil Ditambahkan!!!');
			redirect('Admin/cBarang', 'refresh');
		}
	}
	public function update($id)
	{
		$config['upload_path']          = './asset/foto-produk';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'error' => $this->upload->display_errors(),
				'barang' => $this->mBarang->select()
			);
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/aside');
			$this->load->view('Admin/Barang/vBarang', $data);
			$this->load->view('Admin/Layouts/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'id_kategori' => $this->input->post('kategori'),
				'nama_barang' => $this->input->post('nama'),
				'keterangan' => $this->input->post('keterangan'),
				'harga_supplier' => $this->input->post('harga_supplier'),
				'harga_jual' => $this->input->post('harga_jual'),
				'gambar' => $upload_data['file_name']
			);
			$this->mBarang->update($id, $data);
			$this->session->set_flashdata('success', 'Data barang Berhasil Ditambahkan!!!');
			redirect('Admin/cBarang', 'refresh');
		}
		//tanpa edit gambar
		$data = array(
			'id_kategori' => $this->input->post('kategori'),
			'nama_barang' => $this->input->post('nama'),
			'keterangan' => $this->input->post('keterangan'),
			'harga_supplier' => $this->input->post('harga_supplier'),
			'harga_jual' => $this->input->post('harga_jual')
		);
		$this->mBarang->update($id, $data);
		$this->session->set_flashdata('success', 'Data barang Berhasil Diperbaharui!!!');
		redirect('Admin/cBarang', 'refresh');
	}
}

/* End of file cBarang.php */
