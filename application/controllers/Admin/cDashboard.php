<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$data = array(
			'analisis' => $this->db->query("SELECT * FROM `barang` WHERE stok_min!='0'")->result()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/vDashboard', $data);
		$this->load->view('Admin/Layouts/footer');
	}
}

/* End of file cDashboard.php */
