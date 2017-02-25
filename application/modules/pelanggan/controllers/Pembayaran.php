<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

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

	public function add($id_pemesanan = NULL)
	{
		$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required'); // trigger bootstrap formvalidation
		if ($this->form_validation->run() == FALSE) 
		{
			$data['pemesanan'] = $this->pemesanan->status_segera_dibayar($id_pemesanan)->row();
			$this->template->pelanggan('pembayaran','script_pelanggan',$data);
		} 
		else 
		{
			$id_pemesanan = $this->input->post('id_pemesanan');
			$data = array(
				'id_pelanggan'		=> $this->input->post('id_pelanggan'),
				'id_pemesanan'		=> $id_pemesanan,
				'nama_pemilik'		=> $this->input->post('nama_pemilik'),
				'norek_pemilik'		=> $this->input->post('norek_pemilik'),
				'jml_transfer'		=> $this->input->post('jml_transfer'),
				'tgl_transfer'		=> $this->input->post('tgl_transfer'),
				'jam'				=> $this->input->post('jam'),
				'valid_pembayaran'	=> 'NULL'
			);
			$this->pembayaran->add($data);

			$data_pemesanan = array(
				'status'	=> 'Diproses'
			);
			$this->pemesanan->update($id_pemesanan, $data_pemesanan);
			$this->session->set_flashdata('add', 'Pembayaran berhasil');
			redirect('pelanggan/pemesanan');
		}
	}

}

/* End of file Pembayaran.php */
/* Location: ./application/modules/pelanggan/controllers/Pembayaran.php */