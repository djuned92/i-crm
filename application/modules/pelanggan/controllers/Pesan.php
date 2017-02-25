<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_pemesanan'	=> 'pemesanan'
		));
		if ($this->session->userdata('level') != '4' && $this->session->userdata('login') != TRUE)
		{
			redirect('pelanggan/before_login');
		}
	}

	public function index($id_paket_wisata)
	{
		$date = date_create($this->input->post('tgl_pemesanan'));
		$format_tgl_pemesanan = date_format($date, 'dmY');
		$kode_pemesanan = $format_tgl_pemesanan.''.$this->random_kode_pememsanan();
		$date = date_create($this->input->post('tgl_pemesanan'));
		$tgl_pemesanan = date_format($date,'Y-m-d');

		$data = array(
			'id_pelanggan'		=> $this->input->post('id_pelanggan'),
			'id_paket_wisata'	=> $this->input->post('id_paket_wisata'),
			'kode_pemesanan'	=> $kode_pemesanan,
			'tgl_pemesanan'		=> $tgl_pemesanan,
			'harga_pemesanan'	=> $this->input->post('harga_pemesanan'),
			'status'			=> 'Menunggu'
		);
		$this->pemesanan->add($data);
		$this->session->set_flashdata('add', 'Pemesanan berhasil');
		redirect('pelanggan/pemesanan');
	}

	public function random_kode_pememsanan($length = 4)
	{
		return substr(str_shuffle(implode(array_merge(range(0,9), range('A', 'Z'), range('a', 'z')))), 0, $length);
	}

}

/* End of file Pesan.php */
/* Location: ./application/modules/pelanggan/controllers/Pesan.php */