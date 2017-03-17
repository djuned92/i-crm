<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_paket_wisata'	=> 'paket_wisata',
			'model_promosi'			=> 'promosi'
		));
	}

	public function index($id_paket_wisata)
	{
		$data['detail_wisata'] = $this->paket_wisata->get_by_id($id_paket_wisata)->row();
		$data['paket_wisata'] = $this->paket_wisata->get_limit_4()->result();
		$this->template->pelanggan('detail','script_pelanggan',$data);
	}

}

/* End of file Detail.php */
/* Location: ./application/modules/pelanggan/controllers/Detail.php */