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

	public function ulasan($id_pemesanan)
	{
		return $this->db->select('p.*, pemesanan.*, pw.*')
						->from('pelanggan as p')
						->join('pemesanan','pemesanan.id_pelanggan = p.id_pelanggan')
						->join('paket_wisata as pw','pw.id_paket_wisata = pemesanan.id_paket_wisata')
						->where('pemesanan.id_pemesanan',$id_pemesanan)
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
		$this->db->where('id_pemesanan',$id_pemesanan)->delete('pemesanan');
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

	public function status_disetujui($id_pelanggan)
	{
		$where = "pemesanan.id_pelanggan = $id_pelanggan AND pemesanan.status = 'Disetujui'";
		return $this->db->select('p.*, pemesanan.*, pw.*')
						->from('pelanggan as p')
						->join('pemesanan','pemesanan.id_pelanggan = p.id_pelanggan')
						->join('paket_wisata as pw','pw.id_paket_wisata = pemesanan.id_paket_wisata')
						->where($where)
						->order_by('pemesanan.id_pemesanan','DESC')
						->get();
	}

	public function segera_dibayar($id_pelanggan)
	{
		$where = "pemesanan.id_pelanggan = $id_pelanggan AND pemesanan.status = 'Segera Dibayar'";
		return $this->db->select('p.*, pemesanan.*, pw.*')
						->from('pelanggan as p')
						->join('pemesanan','pemesanan.id_pelanggan = p.id_pelanggan')
						->join('paket_wisata as pw','pw.id_paket_wisata = pemesanan.id_paket_wisata')
						->where($where)
						->order_by('pemesanan.id_pemesanan','DESC')
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

	public function count_pemesanan_by_paket_wisata($id_paket_wisata)
	{
		return $this->db->like('id_paket_wisata',$id_paket_wisata)
						->like('status','Disetujui')
						->from('pemesanan')
						->count_all_results();
	}

	// search manajer
	public function search_manajer($from_tgl, $to_tgl)
	{
		// $from_tgl = date('Y-m-d', strtotime($from_tgl));
		// $to_tgl = date('Y-m-d', strtotime($to_tgl))
		return $this->db->select('p.*, pw.*, pelanggan.nama, pelanggan.id_pelanggan') //
						->from('pemesanan as p')
						->join('paket_wisata as pw','pw.id_paket_wisata = p.id_paket_wisata')
						->join('pelanggan','pelanggan.id_pelanggan = p.id_pelanggan')
						->where('p.tgl_pemesanan >=',$from_tgl)
						->where('p.tgl_pemesanan <=',$to_tgl)
						->where('p.status','Disetujui')
						->group_by('pw.id_paket_wisata')
						->order_by('p.id_pemesanan','DESC')
						->get();
		
		if($q->num_rows() > 0)
		{
			return TRUE;
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

	/**
	 * 30 april 2017
	 */
	public function get_pemesanan()
	{
		return $this->db->select('pemesanan.id_paket_wisata, pemesanan.id_pemesanan, pw.*')
						->from('pemesanan')
						->join('paket_wisata as pw','pemesanan.id_paket_wisata = pw.id_paket_wisata')
						->group_by('pemesanan.id_paket_wisata')
						->order_by('pemesanan.id_pemesanan','DESC')
						->get();	
	}
	
	public function get_pelanggan($id_paket_wisata) 
	{
		return $this->db->select('p.id_pemesanan, p.id_pelanggan, p.id_paket_wisata, pw.id_paket_wisata, pw.nama_wisata,
						pw.tgl_mulai, pelanggan.id_pelanggan, pelanggan.nama, pelanggan.no_telp')
						->from('pemesanan as p')
						->join('paket_wisata as pw','p.id_paket_wisata = pw.id_paket_wisata', 'LEFT')
						->join('pelanggan','p.id_pelanggan = pelanggan.id_pelanggan','LEFT')
						->like('p.status','Disetujui')
						->where('p.id_paket_wisata', $id_paket_wisata)
						->get();
	}

	public function count_paket_wisata($id_paket_wisata)
	{
		$q = $this->db->select('pemesanan.*, pw.*')
						->from('pemesanan')
						->join('paket_wisata as pw','pemesanan.id_paket_wisata = pw.id_paket_wisata','LEFT')
						->where('pemesanan.id_paket_wisata', $id_paket_wisata)
						->get();
		return $q->num_rows();
	}

	public function laporan_pemesanan($id_paket_wisata)
	{
		return $this->db->select('p.id_pemesanan, p.id_pelanggan, p.id_paket_wisata, pw.id_paket_wisata, pw.nama_wisata,
						pw.tgl_mulai, pelanggan.id_pelanggan, pelanggan.nama, pelanggan.no_telp')
						->from('pemesanan as p')
						->join('paket_wisata as pw','p.id_paket_wisata = pw.id_paket_wisata', 'LEFT')
						->join('pelanggan','p.id_pelanggan = pelanggan.id_pelanggan','LEFT')
						->where('p.id_paket_wisata', $id_paket_wisata)
						->get();
	}	
}

/* End of file Model_pemesanan.php */
/* Location: ./application/models/Model_pemesanan.php */