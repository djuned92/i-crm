<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

	public function index()
	{
		$this->template->pelanggan('faq','script_pelanggan');		
	}

}

/* End of file Faq.php */
/* Location: ./application/modules/pelanggan/controllers/Faq.php */