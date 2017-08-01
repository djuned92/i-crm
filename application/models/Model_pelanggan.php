<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pelanggan extends CI_Model {

	public function get_all()
	{
		return $this->db->select('u.*, p.*')
						->from('user as u')
						->join('pelanggan as p','p.id_user = u.id_user')
						->order_by('u.id_user','DESC')
						->get();
	}

	public function get_by_id($id_user)
	{
		return $this->db->select('u.*, p.*')
						->from('user as u')
						->join('pelanggan as p','p.id_user = u.id_user')
						->limit(1)
						->where('u.id_user', $id_user)
						->get();
	}

	public function get_pelanggan_personalisasi($id_pelanggan)
	{
		return $this->db->select('p.*')
						->from('pelanggan as p')
						->limit(1)
						->where('p.id_pelanggan', $id_pelanggan)
						->get();
	}

	public function add($data)
	{
		$this->db->insert('pelanggan',$data);
	}

	public function update($id_user, $data_user, $data_pelanggan)
	{
		$this->db->where('id_user', $id_user)->update('user', $data_user);
		$this->db->where('id_user', $id_user)->update('pelanggan', $data_pelanggan);
	}

	public function update_profile($id_user, $data)
	{
		$this->db->where('id_user', $id_user)->update('pelanggan', $data);
	}

	public function delete($id_user)
	{
		$this->db->where('id_user', $id_user)->delete('user');
		$this->db->where('id_user', $id_user)->delete('pelanggan');
	}
	
	/**
	 * 30 april 2017
	 */
	
	public function get_pelanggan_by_paket_wisata($key)
	{
		return $this->db->select('p.id_pemesanan, p.id_pelanggan, p.id_paket_wisata, pw.id_paket_wisata, pw.nama_wisata,
						pw.tgl_mulai, pelanggan.id_pelanggan')
						->from('pemesanan as p')
						->join('paket_wisata as pw','p.id_paket_wisata = pw.id_paket_wisata', 'LEFT')
						->join('pelanggan','p.id_pelanggan = pelanggan.id_pelanggan','LEFT')
						->group_by('p.id_paket_wisata')
						->where('p.id_paket_wisata', $key)
						->get();
	}

}

/* End of file Model_pelanggan.php */
/* Location: ./application/models/Model_pelanggan.php */