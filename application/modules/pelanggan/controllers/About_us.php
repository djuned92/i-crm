<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends CI_Controller {

	public function index()
	{
		$this->template->pelanggan('about_us','script_pelanggan');		
	}

}

/* End of file About_us.php */
/* Location: ./application/modules/pelanggan/controllers/About_us.php */