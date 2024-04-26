<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPengguna');
	}

	public function index()
	{
		$data = array(
			'pengguna' => $this->mPengguna->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Pengguna/vPengguna', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function create()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'level_pengguna' => $this->input->post('level')
		);
		$this->mPengguna->create($data);
		$this->session->set_flashdata('success', 'Data Pengguna Berhasil Ditambahkan!');
		redirect('Admin/cPengguna');
	}
	public function update($id)
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'level_pengguna' => $this->input->post('level')
		);
		$this->mPengguna->update($id, $data);
		$this->session->set_flashdata('success', 'Data Pengguna Berhasil Diperbaharui!');
		redirect('Admin/cPengguna');
	}
	public function delete($id)
	{
		$this->mPengguna->delete($id);
		$this->session->set_flashdata('success', 'Data Pengguna Berhasil Dihapus!');
		redirect('Admin/cPengguna');
	}
}

/* End of file cPengguna.php */
