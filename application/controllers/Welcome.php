<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function blank()
	{
		$this->template->admin('blank','script');
	}

	public function count()
	{
		$this->load->model('model_po');
		$data = $this->model_po->count_purchase_setuju()->num_rows();
		$po = $this->model_po->count_purchase_order()->num_rows();

		$x = $data - $po;
		echo $x;
	}

	public function count_invoice()
	{
		$this->load->model('model_invoice');
		$po = $this->model_invoice->count_po()->num_rows();
		$invoice = $this->model_invoice->count_invoice()->num_rows();

		$y = $po - $invoice;
		echo $y;
	}
}
