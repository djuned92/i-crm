<?php

class Model_user extends CI_Model{
	
	public function get_user_karyawan() 
	{
		return $this->db->select('u.*, k.*, d.*')
						->from('user as u')
						->join('karyawan as k','u.id_user = k.id_user')
						->join('departement as d','d.id_departement = k.id_departement')
						->join('atasan as a','a.id_departement = d.id_departement')
						->order_by('u.id_user','DESC')
						->get();
	}

	public function get_all($where)
	{
		return $this->db->select('u.*')
						->from('user as u')
						->where($where)
						->get();
	}

	public function add($data)
	{
		$this->db->insert('user', $data);
	}

	public function update($id_user, $data)
	{
		$this->db->where('id_user', $id_user)->update('user', $data);
	}

	public function delete($id_user)
	{
		$this->db->where('id_user', $id_user)->delete('user');
	}

	// cek users login
	public function check_credential()
	{
		$this->load->helper('security');

		$pwd = $this->input->post('password');
		$data = array(
		 		'username'	=> $this->input->post('username'),
		 		'password'	=> do_hash($pwd)
		 	); 

		$query = $this->db->where($data)
		 				  ->limit(1)
		 				  ->get('user');

		if ($query->num_rows() > 0)
		{
			return $query->row();
		} 
		else 
		{
			return FALSE;
		}
	}

	// cek username
	public function check_username()
	{
		$data = array(
			'username'	=> $this->input->post('username')
			);
		$query = $this->db->where($data)
		 				  ->limit(1)
		 				  ->get('user');

		if ($query->num_rows() > 0)
		{
			return $query->row();
		} 
		else 
		{
			return FALSE;
		}

	}

	// cek status aktif / tidak aktif
	public function check_status_user()
	{
		$data = array(
		 		'username'	=> $this->input->post('username'),
		 		'status'	=> 1
		 	); 
		$query = $this->db->where($data)
		 				  ->limit(1)
		 				  ->get('user');

		if ($query->num_rows() > 0)
		{
			return $query->row();
		} 
		else 
		{
			return FALSE;
		}	
	}
}