<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Before_login extends CI_Controller {

	public function index()
	{
		$this->template->pelanggan('before_login','script_pelanggan');		
	}

}

/* End of file Before_login.php */
/* Location: ./application/modules/pelanggan/controllers/Before_login.php */