<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_wisata extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_paket_wisata'	=> 'paket_wisata'
		));


		// if ($this->session->userdata('level') != 2)
		// {
		// 	redirect('pelanggan/before_login');
		// }
	}

	public function index()
	{
		$data['paket_wisata'] = $this->paket_wisata->get_all()->result();
		$this->template->marketing('paket_wisata','script_marketing',$data);
	}

	public function add()
	{
		$this->load->library('upload');

		$this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'required'); // trigger bootstrap formvalidation
		if ($this->form_validation->run() == FALSE) 
		{
			$this->template->marketing('paket_wisata_add','script_marketing');
		} 
		else 
		{
			$config['upload_path']          = './assets/img/';
	        $config['allowed_types']        = 'jpg|png';
	        $config['max_size']             = 1024*10; // 10 mb
	        $config['max_width']            = 2000;
	        $config['max_height']           = 1500;


			$this->upload->initialize($config); // $this->load->library('upload', $config) karena gk bisa. pake yang $this->upload->initialize($config);

	       	if ( ! $this->upload->do_upload('gambar_wisata') && ! $this->upload->do_upload('rundown_acara'))
	        {
	        	//file gagal di upload -> kembali ke form tambah
	        	$error = array('error' => $this->upload->display_errors());
	        	echo $error;
	        }
	        else
	        {
	        	$gambar_wisata = $_FILES['gambar_wisata']['name'];
	        	$rundown_acara = $_FILES['rundown_acara']['name'];
				$data = array (
					'nama_wisata'		=> $this->input->post('nama_wisata'),
					'lokasi'			=> $this->input->post('lokasi'),
					'harga'				=> $this->input->post('harga'),
					'deskripsi'			=> $this->input->post('deskripsi'),
					'gambar_wisata'		=> $gambar_wisata,
					'rundown_acara'		=> $rundown_acara,
					'tgl_mulai'			=> $this->input->post('tgl_mulai'),
					'tgl_akhir'			=> $this->input->post('tgl_akhir'),
					'norek_perusahaan'	=> $this->input->post('norek_perusahaan'),
				);
				// return var_dump($data);
				$this->paket_wisata->add($data);
				$this->session->set_flashdata('add', 'Tempat wisata berhasil ditambah');
				redirect('marketing/paket_wisata');
			}
		}
	}

	public function update($id_paket_wisata)
	{
		$this->load->library('upload');

		$this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'required'); // trigger bootstrap formvalidation
		if ($this->form_validation->run() == FALSE) 
		{
			$data['paket_wisata'] = $this->paket_wisata->get_by_id($id_paket_wisata)->row();
			$this->template->marketing('paket_wisata_edit','script_marketing',$data);
		} 
		else 
		{
			if ($_FILES['gambar_wisata']['name'] != '' && $_FILES['rundown_acara']['name'] != '' ) // dengan foto disi
			{	
				$config['upload_path']          = './assets/img/';
		        $config['allowed_types']        = 'jpg|png';
		        $config['max_size']             = 1024*10; // 10 mb
		        $config['max_width']            = 2000;
		        $config['max_height']           = 1500;
				
				$this->upload->initialize($config); // $this->load->library('upload', $config) karena gk bisa. pake yang $this->upload->initialize($config);

		       	if ( ! $this->upload->do_upload('gambar_wisata') && ! $this->upload->do_upload('rundown_acara') )
		        {
		        	//file gagal di upload -> kembali ke form tambah
		        	$error = array('error' => $this->upload->display_errors());
		        	echo $error;
		        }
		        else
		        {
		        	$gambar_wisata = $_FILES['gambar_wisata']['name'];
	        		$rundown_acara = $_FILES['rundown_acara']['name'];
					$data = array (
						'nama_wisata'		=> $this->input->post('nama_wisata'),
						'lokasi'			=> $this->input->post('lokasi'),
						'harga'				=> $this->input->post('harga'),
						'deskripsi'			=> $this->input->post('deskripsi'),
						'gambar_wisata'		=> $gambar_wisata,
						'rundown_acara'		=> $rundown_acara,
						'tgl_mulai'			=> $this->input->post('tgl_mulai'),
						'tgl_akhir'			=> $this->input->post('tgl_akhir'),
						'norek_perusahaan'	=> $this->input->post('norek_perusahaan'),
					);
					// return var_dump($data);
					$this->paket_wisata->update($id_paket_wisata, $data);
					$this->session->set_flashdata('update', 'Tempat wisata berhasil diperbaharui');
					redirect('marketing/paket_wisata');
				}
			}
			else // tanpa foto diisi
			{
				$data = array (
					'nama_wisata'		=> $this->input->post('nama_wisata'),
					'lokasi'			=> $this->input->post('lokasi'),
					'harga'				=> $this->input->post('harga'),
					'deskripsi'			=> $this->input->post('deskripsi'),
					'tgl_mulai'			=> $this->input->post('tgl_mulai'),
					'tgl_akhir'			=> $this->input->post('tgl_akhir'),
					'norek_perusahaan'	=> $this->input->post('norek_perusahaan'),
				);
				$this->paket_wisata->update($id_paket_wisata, $data);
				$this->session->set_flashdata('update', 'Tempat wisata berhasil diperbaharui');
				redirect('marketing/paket_wisata');
			}
		}
	}

	public function delete($id_paket_wisata)
	{
		$this->paket_wisata->delete($id_paket_wisata);
		$this->session->set_flashdata('delete', 'Paket wisata berhasil dihapus');
		redirect('marketing/paket_wisata');
	}
}

/* End of file Paket_wisata.php */
/* Location: ./application/modules/marketing/controllers/Paket_wisata.php */