<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pemesanan extends CI_Model {

	public function get_all()
	{
		return $this->db->select('p.*, pemesanan.*, pw.*')
						->from('pelanggan as p')
						->join('pemesanan','pemesanan.id_pelanggan = p.id_pelanggan')
						->join('paket_wisata as pw','pw.id_paket_wisata = pemesanan.id_paket_wisata')
						->order_by('pemesanan.id_pemesanan','DESC')
						->get();	
	}

	public function get_by_id($id_pelanggan)
	{
		return $this->db->select('p.*, pemesanan.*, pw.*')
						->from('pelanggan as p')
						->join('pemesanan','pemesanan.id_pelanggan = p.id_pelanggan')
						->join('paket_wisata as pw','pw.id_paket_wisata = pemesanan.id_paket_wisata')
						->where('pemesanan.id_pelanggan',$id_pelanggan)
						->order_by('pemesanan.id_pemesanan','DESC')
						->get();
	}

	public function kode_pemesanan($kode_pemesanan)
	{
		return $this->db->select('p.*')
						->from('pemesanan as p')
						->where('p.kode_pemesanan',$kode_pemesanan)
						->get();
	}

	public function update($id_pemesanan, $data)
	{
		$this->db->where('id_pemesanan',$id_pemesanan)->update('pemesanan',$data);
	}

	public function add($data)
	{
		$this->db->insert('pemesanan',$data);
	}

	public function delete($id_pemesanan)
	{
		$this->db->where('id_pemesanan',$id_pemesanan);
	}
	
	public function status_segera_dibayar($id_pemesanan)
	{
		return $this->db->select('p.*, pemesanan.*, pw.*')
						->from('pelanggan as p')
						->join('pemesanan','pemesanan.id_pelanggan = p.id_pelanggan')
						->join('paket_wisata as pw','pw.id_paket_wisata = pemesanan.id_paket_wisata')
						->limit(1)
						->where('pemesanan.id_pemesanan',$id_pemesanan)
						->get();
	}

	public function search($kode_pemesanan)
	{
		// $q = $this->db->like('p.kode_pemesanan',$kode_pemesanan)
		// 				->from('pemesanan as p')
		// 				->get();

		$q = $this->db->select('p.*, pw.*, pelanggan.nama, pelanggan.id_pelanggan')
						->from('pemesanan as p')
						->join('paket_wisata as pw','pw.id_paket_wisata = p.id_paket_wisata')
						->join('pelanggan','pelanggan.id_pelanggan = p.id_pelanggan')
						->like('p.kode_pemesanan',$kode_pemesanan)
						->get();
		
		if($q->num_rows() > 0)
		{
			return $q->result();
		}
		else
		{
			return FALSE;
		}
	}

	public function status_diproses()
	{
		$where = "pemesanan.status !='Menunggu' || pemesanan.status !='Segera Dibayar'";
		return $this->db->select('p.*, pemesanan.*, pw.*, bayar.*')
						->from('pelanggan as p')
						->join('pemesanan','pemesanan.id_pelanggan = p.id_pelanggan')
						->join('paket_wisata as pw','pw.id_paket_wisata = pemesanan.id_paket_wisata')
						->join('pembayaran as bayar','bayar.id_pemesanan = pemesanan.id_pemesanan')
						->where($where)
						->get();	
	}	
}

/* End of file Model_pemesanan.php */
/* Location: ./application/models/Model_pemesanan.php */