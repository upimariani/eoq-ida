<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

	public function index()
	{
		$this->load->view('vLogin');
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->db->query("SELECT * FROM `pengguna` WHERE username='" . $username . "' AND password='" . $password . "'")->row();

		if ($data) {

			$array = array(
				'id' => $data->id_pengguna
			);

			$this->session->set_userdata($array);

			if ($data->level_pengguna == '1') {
				redirect('Admin/cDashboard');
			} else if ($data->level_pengguna == '2') {
				redirect('Gudang/cDashboard');
			} else if ($data->level_pengguna == '3') {
				redirect('Supplier/cTransaksi');
			} else if ($data->level_pengguna == '4') {
				redirect('Owner/cLaporan');
			}
		} else {
			$this->session->set_flashdata('error', 'Username dan Password anda salah!');
			redirect('cLogin');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->set_flashdata('success', 'Anda berhasil Logout!');
		redirect('cLogin');
	}
}

/* End of file cLogin.php */
