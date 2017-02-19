<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promosi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_paket_wisata'	=> 'paket_wisata',
			'model_promosi'			=> 'promosi'
		));

		$this->load->helper('text');

		// if ($this->session->userdata('level') != 2)
		// {
		// 	redirect('auth/users');
		// }
	}

	public function index()
	{
		$data['promosi'] = $this->promosi->get_all()->result();
		// return var_dump($data);s
		$this->template->marketing('promosi','script_marketing',$data);
	}

	public function add($id_paket_wisata = NULL)
	{
		$this->form_validation->set_rules('nama', 'Nama Promosi', 'required'); // trigger bootstrap formvalidation
		if ($this->form_validation->run() == FALSE) 
		{
			$data['paket_wisata'] = $this->paket_wisata->get_all()->result();
			$this->template->marketing('promosi_add','script_marketing', $data);
		} 
		else 
		{
			$data_promosi = array (
				'id_paket_wisata'=> $this->input->post('id_paket_wisata'),
				'nama'			=> $this->input->post('nama'),
				'isi'			=> $this->input->post('isi'),
				'tgl_promosi'	=> $this->input->post('tgl_promosi'),
				'potongan_harga'	=> $this->input->post('potongan_harga')
			);
			$this->promosi->add($data_promosi);
			$this->session->set_flashdata('add', 'Promosi paket wisata berhasil ditambah');
			redirect('marketing/promosi');
		}
	}

	public function update($id_promosi = NULL)
	{
		$this->form_validation->set_rules('nama', 'Nama Promosi', 'required'); // trigger bootstrap formvalidation
		if ($this->form_validation->run() == FALSE) 
		{
			$data['promosi'] = $this->promosi->get_by_id($id_promosi)->row();
			// return var_dump($data);
			$this->template->marketing('promosi_edit','script_marketing', $data);
		} 
		else 
		{
			$id_paket_wisata = $this->input->post('id_paket_wisata');
			$data_promosi = array (
				'id_paket_wisata'=> $id_paket_wisata,
				'nama'			=> $this->input->post('nama'),
				'isi'			=> $this->input->post('isi'),
				'tgl_promosi'	=> $this->input->post('tgl_promosi'),
				'potongan_harga'	=> $this->input->post('potongan_harga')
			);
			$this->promosi->update($id_promosi, $data_promosi);
			$this->session->set_flashdata('update', 'Promosi paket wisata berhasil ditambah');
			redirect('marketing/promosi');
		}	
	}

	public function paket_wisata($id_paket_wisata)
	{
		$data = $this->paket_wisata->get_by_id($id_paket_wisata)->row();
		echo json_encode($data);
	}

}

/* End of file Promosi.php */
/* Location: ./application/modules/marketing/controllers/Promosi.php */