<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_atasan extends CI_Model {

	public function get_all()
	{
		return $this->db->select('d.*, a.*')
						->from('atasan as a')
						->join('departement as d','a.id_departement = d.id_departement')
						->order_by('a.id_atasan','ASC')
						->get();
	}

	public function get_by_id($id_atasan)
	{
		return $this->db->select('d.*, a.*')
						->from('atasan as a')
						->join('departement as d','a.id_departement = d.id_departement')
						->limit(1)
						->where('a.id_atasan',$id_atasan)
						->get();
	}
	

}

/* End of file Model_atasan.php */
/* Location: ./application/models/Model_atasan.php */