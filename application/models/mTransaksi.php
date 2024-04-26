<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksi extends CI_Model
{
	public function createTransaksi($data)
	{
		$this->db->insert('transaksi', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pengguna', 'transaksi.id_pengguna = pengguna.id_pengguna', 'left');
		return $this->db->get()->result();
	}
	public function supplier()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->where('level_pengguna=3');
		return $this->db->get()->result();
	}
	public function detail($id_transaksi)
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM `transaksi` JOIN pengguna ON transaksi.id_pengguna=pengguna.id_pengguna WHERE id_transaksi='" . $id_transaksi . "'")->row();
		$data['barang'] = $this->db->query("SELECT * FROM `transaksi` JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi JOIN barang ON barang.id_barang=detail_transaksi.id_barang WHERE transaksi.id_transaksi='" . $id_transaksi . "'")->result();
		return $data;
	}
}

/* End of file mTransaksi.php */
