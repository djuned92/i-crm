<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_paket_wisata'	=> 'paket_wisata',
			'model_promosi'			=> 'promosi',
			'model_ulasan'			=> 'ulasan'
		));
	}
	public function index()
	{
		$this->load->library('pagination');

		// pagination settings
	    // $config['base_url'] = 'http://localhost/i-crm/pelanggan/home/index';
	    // $config['total_rows'] = $this->paket_wisata->count_all();
	    // $config['per_page'] = 1;
	    // $config['uri_segment' ] = 4;
	    // $choice = $config['total_rows'] / $config['per_page'];
	    // $config['num_links'] = floor($choice);

	    // //config bootstrap
	    // $config['full_tag_open'] = '<ul class="pagination">';
	    // $config['full_tag_close'] = '</ul>';
	    // $config['first_link'] = false;
	    // $config['last_link'] = false;
	    // $config['first_tag_open'] = '<li>';
	    // $config['first_tag_close'] = '</li>';
	    // $config['prev_link'] = '&laquo';
	    // $config['prev_tag_open'] = '<li class="prev">';
	    // $config['prev_tag_close'] = '</li>';
	    // $config['next_link'] ='&raquo';
	    // $config['next_tag_open'] = '<li>';
	    // $config['next_tag_close'] = '</li>';
	    // $config['last_tag_open'] = '<li>';
	    // $config['last_tag_close'] = '</li>';
	    // $config['cur_tag_open'] = '<li class="active"><a href="#">';
	    // $config['cur_tag_close'] = '</a></li>';
	    // $config['num_tag_open'] = '<li>';
	    // $config['num_tag_close'] = '</li>';

	    // $this->pagination->initialize($config);
	    // $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4): 0;
	    // $data['paket_wisata'] = $this->paket_wisata->paket_wisata_list($data['page'], $config['per_page'])->result();
	    // $data['pagination'] = $this->pagination->create_links();
		$data['paket_wisata'] = $this->paket_wisata->get_all()->result();
		$this->template->pelanggan('home','script_pelanggan',$data);
	}

	public function register()
	{
		$this->template->pelanggan('register','script_pelanggan');
	}
}

/* End of file Home.php */
/* Location: ./application/modules/pelanggan/controllers/Home.php */