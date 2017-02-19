<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->template->marketing('home','script_marketing');	
	}

}

/* End of file Home.php */
/* Location: ./application/modules/marketing/controllers/Home.php */