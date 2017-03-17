<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_chat extends CI_Model {

	public function get_all($where)
	{
		return $this->db->select('c.*')
						->from('chat as c')
						->where($where)
						->order_by('c.create_at','ASC')
						->get();
	}	

	public function get_last_id($where)
	{
		return $this->db->select('c.*')
						->from('chat as c')
						->where($where)
						->limit(1)
						->order_by('id_chat','DESC')
						->get()
						->row_array();
	}

	public function add($data)
	{
		return $this->db->insert('chat',$data);
	}

}

/* End of file Model_chat.php */
/* Location: ./application/models/Model_chat.php */