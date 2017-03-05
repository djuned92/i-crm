<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihat_pemesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_pemesanan'	=> 'pemesanan',

		));

		// if ($this->session->userdata('level') != 2)
		// {
		// 	redirect('pelanggan/before_login');
		// }
	}
	
	public function index()
	{
		$kode_pemesanan = $this->input->post('kode_pemesanan');
		$search = $this->pemesanan->search($kode_pemesanan);
		if($search == TRUE)
		{
			$data['pemesanan'] = $search;
			$this->template->marketing('lihat_pemesanan','script_marketing', $data);
		}
		elseif ($search == FALSE) 
		{
			$this->session->set_flashdata('kode_salah', 'Kode pemesanan salah');
			redirect('marketing/lihat_pemesanan');
		}
		else
		{
			$this->template->marketing('lihat_pemesanan','script_marketing');
		}
	}
}

/* End of file Lihat_pemesanan.php */
/* Location: ./application/modules/marketing/controllers/Lihat_pemesanan.php */