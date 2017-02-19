<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->template->admin('home','script_admin');	
	}

}

/* End of file Home.php */
/* Location: ./application/modules/admin/controllers/Home.php */