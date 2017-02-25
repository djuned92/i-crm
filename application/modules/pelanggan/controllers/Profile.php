<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_pelanggan'	=> 'pelanggan'
		));
		if ($this->session->userdata('level') != '4' && $this->session->userdata('login') != TRUE)
		{
			redirect('pelanggan/before_login');
		}
	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');

		$data['pelanggan'] = $this->pelanggan->get_by_id($id_user)->row();
		// return var_dump($data);
		$this->template->pelanggan('profile','script_pelanggan',$data);
	}

	public function update($id_user = NULL)
	{
		$this->load->helper('security');

		$this->form_validation->set_rules('nama','Nama','required'); // trigger bootstrap form validation
		if ($this->form_validation->run() == FALSE) 
		{
			$data['pelanggan'] = $this->pelanggan->get_by_id($id_user)->row();
			// return var_dump($data);
			$this->template->pelanggan('profile', 'script_pelanggan', $data);
		} 
		else 
		{
			$id_user = $this->input->post('id_user');
			$data = array (
				'id_user'		=> $id_user,
				'nama' 			=> $this->input->post('nama'),
				'alamat' 		=> $this->input->post('alamat'),
				// 'tempat_lahir' 	=> $this->input->post('tempat_lahir'),
				// 'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_telp' 		=> $this->input->post('no_telp'),
				'email' 		=> $this->input->post('email')
			);

			$this->pelanggan->update_profile($id_user, $data);
			// return var_dump($data);
			$this->session->set_flashdata('profile', 'Profile berhasil diperbaharui');
			redirect('pelanggan/home');
		}
	}
}

/* End of file Profile.php */
/* Location: ./application/modules/pelanggan/controllers/Profile.php */