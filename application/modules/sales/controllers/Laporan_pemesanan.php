<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pemesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_pemesanan'	=> 'pemesanan',
			'model_pelanggan'	=> 'pelanggan'
		));

		// if ($this->session->userdata('level') != 5)
		// {
		// 	redirect('pelanggan/before_login');
		// }
	}

	public function index()
	{
		$data['pemesanan'] = $this->pemesanan->get_pemesanan()->result();
		// echo "<pre>";
		// return var_dump($data['pelanggan']);

		$this->template->sales('laporan_pemesanan', 'script_sales', $data);
	}

}

/* End of file Laporan_pemesanan.php */
/* Location: ./application/modules/sales/controllers/Laporan_pemesanan.php */