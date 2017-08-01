<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_paket_wisata'=> 'paket_wisata',
			'model_ulasan'		=> 'ulasan'
		));
	}

	public function index()
	{
		$this->load->helper('text');
		$data['paket_wisata'] = $this->paket_wisata->ulasan_all()->result();
		$this->template->pelanggan('testimoni','script_pelanggan',$data);
	}

	public function detail($id_paket_wisata)
	{
		$data['paket_wisata'] = $this->ulasan->detail_testimoni($id_paket_wisata)->row();
		$this->template->pelanggan('testimoni_detail','script_pelanggan',$data);
	}

	public function get($id_paket_wisata)
	{
		$data = $this->ulasan->get_testimoni($id_paket_wisata)->result();
		echo json_encode($data);
	}

}

/* End of file Testimoni.php */
/* Location: ./application/modules/pelanggan/controllers/Testimoni.php */