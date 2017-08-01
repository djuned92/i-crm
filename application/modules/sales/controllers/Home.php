<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->template->sales('home','script_sales');	
	}

}

/* End of file Home.php */
/* Location: ./application/modules/sales/controllers/Home.php */