<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_pemesanan'	=> 'pemesanan'
		));
		// if ($this->session->userdata('level') != 3)
		// {
		// 	redirect('pelanggan/before_login');
		// }
	}

	public function index()
	{
		$from_tgl = date_create($this->input->post('from_tgl'));
		$from_tgl = date_format($from_tgl,'Y-m-d');

		$to_tgl = date_create($this->input->post('to_tgl'));
		$to_tgl = date_format($to_tgl,'Y-m-d');
		$search = $this->pemesanan->search_manajer($from_tgl, $to_tgl);

		// return var_dump($search);
		if($search != NULL)
		{
			$data['pemesanan'] = $search->result();
			// echo "<pre>";
			// return var_dump($data['pemesanan']);
			$this->template->manajer('data_pelanggan','script_manajer', $data);
		}
		elseif ($search == NULL) 
		{
			$this->session->set_flashdata('no_data', 'Tidak ada pemesanan di tanggal tersebut');
			redirect('manajer/data_pelanggan');
		}
		else
		{
			$this->template->manajer('data_pelanggan','script_manajer');
		}
	}
}

/* End of file Data_pelanggan.php */
/* Location: ./application/modules/manajer/controllers/Data_pelanggan.php */