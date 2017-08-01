<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_personalisasi extends CI_Model {

	public function add($data)
	{
		return $this->db->insert('personalisasi',$data);
	}

}

/* End of file Model_personalisasi.php */
/* Location: ./application/models/Model_personalisasi.php */