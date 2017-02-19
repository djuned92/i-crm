<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_user' 		=> 'user',
			'model_pelanggan'	=> 'pelanggan'
		));

		// if ($this->session->userdata('level') != 1)
		// {
		// 	redirect('auth/users');
		// }
	}

	public function index()
	{
		$data['pelanggan'] = $this->pelanggan->get_all()->result();
		$this->template->admin('data_pelanggan','script_admin', $data);
	}

	public function add()
	{
		$this->load->helper('security');

		$this->form_validation->set_rules('username','Username','required'); // trigger bootstrap form validation
		if ($this->form_validation->run() == FALSE) 
		{
			$this->template->admin('data_pelanggan_add', 'script_admin');
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
			redirect('admin/data_pelanggan');
		}
	}

	public function update($id_user = NULL)
	{
		$this->load->helper('security');

		$this->form_validation->set_rules('username','Username','required'); // trigger bootstrap form validation
		if ($this->form_validation->run() == FALSE) 
		{
			$data['pelanggan'] = $this->pelanggan->get_by_id($id_user)->row();
			// return var_dump($data);
			$this->template->admin('data_pelanggan_edit', 'script_admin', $data);
		} 
		else 
		{
			$data_user = array (
				'username' 	=> $this->input->post('username'),
				'password'	=> do_hash($this->input->post('password')),
				'level' 	=> '4'
			);
			$id_user = $this->input->post('id_user');
			// $id_pelanggan = $this->input->post('id_pelanggan');

			$data_pelanggan = array (
				'id_user'		=> $id_user,
				'nama' 			=> $this->input->post('nama'),
				'alamat' 		=> $this->input->post('alamat'),
				'tempat_lahir' 	=> $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'no_telp' 		=> $this->input->post('no_telp'),
				'email' 		=> $this->input->post('email')
			);

			$this->pelanggan->update($id_user, $data_user, $data_pelanggan);
			// return var_dump($data);
			$this->session->set_flashdata('update', 'Data pelanggan berhasil diperbaharui');
			redirect('admin/data_pelanggan');
		}
	}

	public function delete($id_user)
	{
		$this->pelanggan->delete($id_user);
		$this->session->set_flashdata('delete', 'Data pelanggan berhasil dihapus');
		redirect('admin/data_pelanggan');
	}

}

/* End of file Data_pelanggan.php */
/* Location: ./application/modules/admin/controllers/Data_pelanggan.php */