<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function index()
	{
		$this->template->manajer('home','script_manajer');	
	}

}

/* End of file Home.php */
/* Location: ./application/modules/manager/controllers/Home.php */