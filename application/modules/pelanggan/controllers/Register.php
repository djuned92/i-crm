<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_user' 		=> 'user',
			'model_pelanggan'	=> 'pelanggan'
		));
	}

	public function index()
	{
		$this->template->pelanggan('register','script_pelanggan');	
	}

	public function add()
	{
		$this->load->helper('security');

		$this->form_validation->set_rules('username','Username','required'); // trigger bootstrap form validation
		if ($this->form_validation->run() == FALSE) 
		{
			$this->template->pelanggan('register', 'script_pelanggan');
		} 
		else 
		{
			$data_user = array (
				'username' 	=> $this->input->post('username'),
				'password'	=> do_hash($this->input->post('password')),
				'level' 	=> '4'
			);
			$this->user->add($data_user);
			$id_user = $this->db->insert_id();

			$data = array (
				'id_user' 		=> $id_user,
				'nama' 			=> $this->input->post('nama'),
				'alamat' 		=> $this->input->post('alamat'),
				'tempat_lahir' 	=> $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_telp' 		=> $this->input->post('no_telp'),
				'email' 		=> $this->input->post('email')
			);

			$this->pelanggan->add($data);
			// return var_dump($data_user, $data);
			$this->session->set_flashdata('add', 'Data pelanggan berhasil ditambah');
			redirect('pelanggan/register');
		}
	}
}

/* End of file Register.php */
/* Location: ./application/modules/pelanggan/controllers/Register.php */