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

	public function add($data)
	{
		$this->db->insert('pelanggan',$data);
	}

	public function update($id_user, $data_user, $data_pelanggan)
	{
		$this->db->where('id_user', $id_user)->update('user', $data_user);
		$this->db->where('id_user', $id_user)->update('pelanggan', $data_pelanggan);
	}

	public function delete($id_user)
	{
		$this->db->where('id_user', $id_user)->delete('user');
		$this->db->where('id_user', $id_user)->delete('pelanggan');
	}

}

/* End of file Model_pelanggan.php */
/* Location: ./application/models/Model_pelanggan.php */