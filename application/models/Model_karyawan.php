<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_karyawan extends CI_Model {

	public function get_all()
	{
		return $this->db->select('u.*, k.*, d.*, a.*')
						->from('user as u')
						->join('karyawan as k','u.id_user = k.id_user')
						->join('departement as d','d.id_departement = k.id_departement')
						->join('atasan as a','a.id_atasan = k.id_atasan')
						->order_by('k.id_karyawan','DESC')
						->get();
	}
	
	public function get_by_id($id_user)
	{
		return $this->db->select('u.*, k.*, d.*, a.*')
						->from('user as u')
						->join('karyawan as k','u.id_user = k.id_user')
						->join('departement as d','d.id_departement = k.id_departement')
						->join('atasan as a','a.id_atasan = k.id_atasan')
						->limit(1)
						->where('u.id_user', $id_user)
						->get();
	}

	public function add($data)
	{
		$this->db->insert('karyawan', $data);
	}

	public function update($id_user, $data_user, $data_karyawan)
	{
		$this->db->where('id_user', $id_user)->update('user', $data_user);
		$this->db->where('id_user', $id_user)->update('karyawan', $data_karyawan);
	}

	public function delete($id_user)
	{
		$this->db->where('id_user', $id_user)->delete('user');
		$this->db->where('id_user', $id_user)->delete('karyawan');
	}

}

/* End of file Model_karyawan.php */
/* Location: ./application/models/Model_karyawan.php */