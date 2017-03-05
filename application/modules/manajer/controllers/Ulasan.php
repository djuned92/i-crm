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
		// if ($this->session->userdata('level') != 3)
		// {
		// 	redirect('pelanggan/before_login');
		// }
	}

	public function index()
	{
		$this->load->helper('text');
		$data['paket_wisata'] = $this->paket_wisata->get_all()->result();
		$this->template->manajer('ulasan','script_manajer',$data);
	}

	public function detail($id_paket_wisata)
	{
		$data['paket_wisata'] = $this->ulasan->detail_testimoni($id_paket_wisata)->row();
		$this->template->manajer('ulasan_detail','script_manajer',$data);
	}

}

/* End of file Ulasan.php */
/* Location: ./application/modules/manajer/controllers/Ulasan.php */