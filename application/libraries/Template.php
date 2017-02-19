<?php

class Template {
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('parser');
	}

	public function admin($content, $script = NULL, $data = NULL)
	{
		$data = array(
			'head'			=> $this->CI->load->view('template/admin/head', $data, TRUE),
			'logo_header'	=> $this->CI->load->view('template/admin/logo_header', $data, TRUE),
			'menu_section'	=> $this->CI->load->view('template/admin/menu_section', $data, TRUE),
			'content'		=> $this->CI->load->view($content, $data, TRUE),
			'footer'		=> $this->CI->load->view('template/admin/footer', $data, TRUE),
			'script'		=> $this->CI->load->view('template/admin/script', $data, TRUE)
			);
		
		if ($script != NULL) 
		{
			$data['other-script'] = $this->CI->load->view($script, $data, TRUE);
		}
		
		$this->CI->parser->parse('template/admin/index', $data);
	}

	public function marketing($content, $script = NULL, $data = NULL)
	{
		$data = array(
			'head'			=> $this->CI->load->view('template/marketing/head', $data, TRUE),
			'logo_header'	=> $this->CI->load->view('template/marketing/logo_header', $data, TRUE),
			'menu_section'	=> $this->CI->load->view('template/marketing/menu_section', $data, TRUE),
			'content'		=> $this->CI->load->view($content, $data, TRUE),
			'footer'		=> $this->CI->load->view('template/marketing/footer', $data, TRUE),
			'script'		=> $this->CI->load->view('template/marketing/script', $data, TRUE)
			);
		
		if ($script != NULL) 
		{
			$data['other-script'] = $this->CI->load->view($script, $data, TRUE);
		}
		
		$this->CI->parser->parse('template/marketing/index', $data);
	}

	public function pelanggan($content, $script = NULL, $data = NULL)
	{
		$data = array(
			'head'			=> $this->CI->load->view('template/pelanggan/head', $data, TRUE),
			'topbar'		=> $this->CI->load->view('template/pelanggan/topbar', $data, TRUE),
			'navbar'		=> $this->CI->load->view('template/pelanggan/navbar', $data, TRUE),
			'content'		=> $this->CI->load->view($content, $data, TRUE),
			'footer'		=> $this->CI->load->view('template/pelanggan/footer', $data, TRUE),
			'copyright'		=> $this->CI->load->view('template/pelanggan/copyright', $data, TRUE),
			'script'		=> $this->CI->load->view('template/pelanggan/script', $data, TRUE)
			);
		
		if ($script != NULL) 
		{
			$data['other-script'] = $this->CI->load->view($script, $data, TRUE);
		}
		
		$this->CI->parser->parse('template/pelanggan/index', $data);
	}
}