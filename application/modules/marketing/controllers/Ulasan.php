<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_ulasan'	=> 'ulasan',
			'model_paket_wisata'	=> 'paket_wisata'
		));
		// if ($this->session->userdata('level') != 4)
		// {
		// 	redirect('pelanggan/before_login');
		// }
	}

	public function index()
	{
		$this->load->helper('text');
		$data['paket_wisata'] = $this->paket_wisata->ulasan_not_null()->result();
		// echo "<pre>";
		// return var_dump($data['paket_wisata']);
		$this->template->marketing('ulasan','script_marketing',$data);
	}

	public function detail($id_paket_wisata)
	{
		$data['paket_wisata'] = $this->ulasan->detail_testimoni($id_paket_wisata)->row();
		// echo "<pre>";
		// return var_dump($data['paket_wisata']);
		$this->template->marketing('ulasan_detail','script_marketing',$data);
	}

}

/* End of file Ulasan.php */
/* Location: ./application/modules/marketing/controllers/Ulasan.php */