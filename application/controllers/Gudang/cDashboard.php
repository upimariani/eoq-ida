<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$data = array(
			'analisis' => $this->db->query("SELECT * FROM `barang` WHERE stok_min!='0'")->result()
		);
		$this->load->view('Gudang/Layouts/head');
		$this->load->view('Gudang/Layouts/aside');
		$this->load->view('Gudang/vDashboard', $data);
		$this->load->view('Gudang/Layouts/footer');
	}
}

/* End of file cDashboard.php */
