<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->template->pelanggan('contact_us','script_pelanggan');	
	}

}

/* End of file Contact_us.php */
/* Location: ./application/modules/pelanggan/controllers/Contact_us.php */