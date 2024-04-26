<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mBarangKeluar extends CI_Model
{
	public function periode()
	{
		return $this->db->query("SELECT * FROM `barang_keluar` GROUP BY tgl_keluar")->result();
	}
	public function select($tgl)
	{
		$this->db->select('*');
		$this->db->from('barang_keluar');
		$this->db->join('dbarang_keluar', 'barang_keluar.id_bkeluar = dbarang_keluar.id_bkeluar', 'left');
		$this->db->join('barang', 'barang.id_barang = dbarang_keluar.id_barang', 'left');
		$this->db->where('tgl_keluar', $tgl);
		return $this->db->get()->result();
	}
}

/* End of file mBarangKeluar.php */
