<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_user' 		=> 'user',
			'model_karyawan'	=> 'karyawan',
			'model_departement'	=> 'departement',
			'model_atasan'		=> 'atasan'
		));

		// if ($this->session->userdata('level') != 1)
		// {
		// 	redirect('pelanggan/before_login');
		// }
	}

	public function index()
	{
		$data['karyawan'] = $this->karyawan->get_all()->result();
		$this->template->admin('data_pengguna','script_admin', $data);
	}

	public function add()
	{
		$this->load->helper('security');

		$this->form_validation->set_rules('username', 'Username', 'required'); // trigger bootstrap formvalidation
		if ($this->form_validation->run() == FALSE) 
		{
			$data['departement'] = $this->departement->get_all()->result();
			$data['atasan'] = $this->atasan->get_all()->result();
			$this->template->admin('data_pengguna_add','script_admin', $data);
		} 
		else 
		{
			$data_user = array (
				'username' 	=> $this->input->post('username'),
				'password'	=> do_hash($this->input->post('password')),
				'level' 	=> $this->input->post('level')
			);
			$this->user->add($data_user);
			$id_user = $this->db->insert_id();

			$data_karyawan = array (
				'id_user'		=> $id_user,
				'id_atasan'		=> $this->input->post('id_atasan'),
				'id_departement'=> $this->input->post('id_departement'),
				'nama'			=> $this->input->post('nama'),
				'alamat'		=> $this->input->post('alamat'),
				'no_telp'		=> $this->input->post('no_telp'),
				'email'			=> $this->input->post('email'),
				'jabatan'		=> $this->input->post('jabatan'),
			);
			$this->karyawan->add($data_karyawan);
			$this->session->set_flashdata('add', 'Data pengguna berhasil ditambah');
			redirect('admin/data_pengguna');
		}
	}

	public function update($id_user = NULL)
	{
		$this->load->helper('security');

		$this->form_validation->set_rules('username', 'Username', 'required'); // trigger bootstrap formvalidation
		if ($this->form_validation->run() == FALSE) 
		{
			$data['departement'] = $this->departement->get_all()->result();
			$data['atasan'] = $this->atasan->get_all()->result();
			$data['karyawan'] = $this->karyawan->get_by_id($id_user)->row();
			$this->template->admin('data_pengguna_edit','script_admin', $data);
		} 
		else 
		{
			$data_user = array (
				'username' 	=> $this->input->post('username'),
				'password'	=> do_hash($this->input->post('password')),
				'level' 	=> $this->input->post('level')
			);
			$id_user = $this->input->post('id_user');

			$data_karyawan = array (
				'id_user'		=> $id_user,
				'id_atasan'		=> $this->input->post('id_atasan'),
				'id_departement'=> $this->input->post('id_departement'),
				'nama'			=> $this->input->post('nama'),
				'alamat'		=> $this->input->post('alamat'),
				'no_telp'		=> $this->input->post('no_telp'),
				'email'			=> $this->input->post('email'),
				'jabatan'		=> $this->input->post('jabatan'),
			);
			$this->karyawan->update($id_user, $data_user, $data_karyawan);
			$this->session->set_flashdata('update', 'Data pengguna berhasil diperbaharui');
			redirect('admin/data_pengguna');
		}	
	}

	public function delete($id_user)
	{
		$this->karyawan->delete($id_user);
		$this->session->set_flashdata('delete', 'Data pengguna berhasil dihapus');
		redirect('admin/data_pengguna');
	}

	public function atasan($id_atasan)
	{
		$atasan = $this->atasan->get_by_id($id_atasan)->row();
		echo json_encode($atasan);
	}
}

/* End of file Data_pengguna.php */
/* Location: ./application/modules/admin/controllers/Data_pengguna.php */