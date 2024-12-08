<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAnalisis extends CI_Model
{
	public function barang()
	{
		return $this->db->query("SELECT * FROM `analisis` JOIN barang ON analisis.id_barang=barang.id_barang JOIN kategori ON kategori.id_kategori=barang.id_kategori GROUP BY analisis.id_barang")->result();
	}

	//data variabel
	public function variabel()
	{
		$data['barang'] = $this->db->query("SELECT * FROM `dbarang_keluar` JOIN barang ON barang.id_barang=dbarang_keluar.id_barang GROUP BY barang.id_barang")->result();
		$data['periode'] = $this->db->query("SELECT YEAR(tgl_keluar) as tahun FROM `barang_keluar` GROUP BY YEAR(tgl_keluar)")->result();
		$data['bulan'] = $this->db->query("SELECT MONTH(tgl_keluar) as bulan FROM `barang_keluar` GROUP BY MONTH(tgl_keluar)")->result();
		return $data;
	}

	public function select($id_barang)
	{
		return $this->db->query("SELECT * FROM `analisis` join barang ON barang.id_barang=analisis.id_barang WHERE barang.id_barang='" . $id_barang . "'")->result();
	}
}

/* End of file mAnalisis.php */
