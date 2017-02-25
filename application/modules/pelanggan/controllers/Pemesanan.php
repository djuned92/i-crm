<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_pemesanan'	=> 'pemesanan',
			'model_pelanggan'	=> 'pelanggan',
			'model_pembayaran'	=> 'pembayaran'
		));
		if ($this->session->userdata('level') != '4' && $this->session->userdata('login') != TRUE)
		{
			redirect('pelanggan/before_login');
		}
	}

	public function index($id_pelanggan = NULL)
	{
		$id_user = $this->session->userdata('id_user');
		$pelanggan = $this->pelanggan->get_by_id($id_user)->row();
		$id_pelanggan = $pelanggan->id_pelanggan;

		$data['pemesanan'] = $this->pemesanan->get_by_id($id_pelanggan)->result();
		// return var_dump($data);
		$this->template->pelanggan('pemesanan','script_pelanggan',$data);
	}

}

/* End of file Pemesanan.php */
/* Location: ./application/modules/pelanggan/controllers/Pemesanan.php */