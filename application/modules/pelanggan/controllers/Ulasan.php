<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulasan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_paket_wisata'	=> 'paket_wisata',
			'model_pemesanan'		=> 'pemesanan',
			'model_pelanggan'		=> 'pelanggan',
			'model_ulasan'			=> 'ulasan'
		));

		if ($this->session->userdata('level') != '4' && $this->session->userdata('login') != TRUE)
		{
			redirect('pelanggan/before_login');
		}
	}

	public function index()
	{
		$this->load->helper('text');

		$id_user = $this->session->userdata('id_user');
		$pelanggan = $this->pelanggan->get_by_id($id_user)->row();
		$id_pelanggan = $pelanggan->id_pelanggan;

		// $tgl_akhir = date_create($pemesanan->tgl_akhir);
		// $tgl_akhir = date_format($tgl_akhir,'Y-m-d');
		// $tgl_akhir_tomorrow = date($tgl_akhir, strtotime('tomorrow'));

		$data['paket_wisata'] = $this->pemesanan->status_disetujui($id_pelanggan)->result();
		// return var_dump($data);
		$this->template->pelanggan('ulasan','script_pelanggan',$data);
	}

	public function add($id_pemesanan = NULL)
	{
		$this->form_validation->set_rules('isi_kritik', 'Isi Kritik', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['paket_wisata'] = $this->pemesanan->ulasan($id_pemesanan)->row();
			// return var_dump($data);
			$this->template->pelanggan('ulasan_add','script_pelanggan',$data);
		}
		else
		{
			$data = array(
				'id_pemesanan'		=> $this->input->post('id_pemesanan'),
				'id_paket_wisata'	=> $this->input->post('id_paket_wisata'),
				'id_pelanggan'		=> $this->input->post('id_pelanggan'),
				'rating'			=> $this->input->post('rating'),
				'isi_kritik'		=> $this->input->post('isi_kritik'),
				'isi_testimoni'		=> $this->input->post('isi_testimoni')
			);
			$this->ulasan->add($data);
			$this->session->set_flashdata('add', 'Ulasan berhasil');
			redirect('pelanggan/ulasan');
		}
	}

}

/* End of file Ulasan.php */
/* Location: ./application/modules/pelanggan/controllers/Ulasan.php */

