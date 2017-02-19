<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat_pemesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_lihat_pemesanan'	=> 'lihat_pemesanan'
		));


		// if ($this->session->userdata('level') != 2)
		// {
		// 	redirect('auth/users');
		// }
	}
	
	public function index()
	{
		$this->template->marketing('lihat_pemesanan','script_marketing');
	}

}

/* End of file Lihat_pemesanan.php */
/* Location: ./application/modules/marketing/controllers/Lihat_pemesanan.php */