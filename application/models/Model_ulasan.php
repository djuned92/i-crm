<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ulasan extends CI_Model {

	// get testimoni dan kritik
	public function get_testimoni($id_paket_wisata)
	{
		return $this->db->select('u.*, pw.id_paket_wisata, p.nama, p.id_pelanggan')
						->from('ulasan as u')
						->join('paket_wisata as pw','pw.id_paket_wisata = u.id_paket_wisata')
						->join('pelanggan as p','p.id_pelanggan = u.id_pelanggan')
						->where('pw.id_paket_wisata', $id_paket_wisata)
						->get();
	}

	public function add($data)
	{
		$this->db->insert('ulasan',$data);
	}

	public function check_ulasan($id_pelanggan, $id_paket_wisata)
	{
		return $this->db->select('p.*, u.*')
						->from('pelanggan as p')
						->join('ulasan as u','u.id_pelanggan = p.id_pelanggan')
						->join('paket_wisata as pw','u.id_paket_wisata = u.id_paket_wisata')
						->where('u.id_pelanggan',$id_pelanggan)
						->where('u.id_paket_wisata',$id_paket_wisata)
						->get();
	}

	public function count_ulasan()
	{
		return $this->db->count_all('ulasan');
	}

	// detail testimoni dan kritik
	public function detail_testimoni($id_paket_wisata)
	{
		return $this->db->select('p.*, u.*, pw.*')
						->from('pelanggan as p')
						->join('ulasan as u','u.id_pelanggan = p.id_pelanggan')
						->join('paket_wisata as pw','u.id_paket_wisata = u.id_paket_wisata')
						->where('pw.id_paket_wisata',$id_paket_wisata)
						->get();
	}

	public function rating($id_paket_wisata)
	{
		return $this->db->select_avg('rating')
						->where('id_paket_wisata',$id_paket_wisata)
						->get('ulasan');
	}
}

/* End of file Model_ulasan.php */
/* Location: ./application/models/Model_ulasan.php */