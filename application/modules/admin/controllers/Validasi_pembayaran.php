<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi_pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_pemesanan'	=> 'pemesanan',
			'model_pembayaran'	=> 'pembayaran'
		));

		// if ($this->session->userdata('level') != 1)
		// {
		// 	redirect('pelanggan/before_login');
		// }
	}

	public function index()
	{
		$data['pemesanan'] = $this->pemesanan->status_diproses()->result();
		// return var_dump($data);
		$this->template->admin('validasi_pembayaran','script_admin',$data);
	}

	public function valid($id_pemesanan)
	{
		$this->load->library('email');

		// configure email setting
		$config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'ahmaddjunaedi92@gmail.com'; //bangzafran445@gmail.com
        $config['smtp_pass'] = 'junjunned92'; //bastol1234567 
        // $config['protocol'] = 'mail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);

        $to_email = $this->input->post('email');
		$subject = "Validasi Pembayaran";
		$message = "Pembayaran Valid";

        // send email
        $this->email->from('ahmaddjunaedi92@gmail.com','Ahmad Djunaedi');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);

        if($this->email->send())
		{
			$data = array(
			'status'	=> 'Disetujui'
			);
			$this->pemesanan->update($id_pemesanan, $data);

			$data = array(
				'valid_pembayaran'	=> 'Valid'
			);
			$this->pembayaran->update($id_pemesanan, $data);
			$this->session->set_flashdata('add', 'Status pembayaran berhasil diperbaharui');
			redirect('admin/validasi_pembayaran');
		}
		else
		{
			print_r($this->email->print_debugger());
		}
	}

	public function tidak_valid($id_pemesanan)
	{
		$this->load->library('email');

		// configure email setting
		$config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'ahmaddjunaedi92@gmail.com'; //bangzafran445@gmail.com
        $config['smtp_pass'] = 'junjunned92'; //bastol1234567 
        // $config['protocol'] = 'mail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);

        $to_email = $this->input->post('email');
		$subject = "Validasi Pembayaran";
		$message = "Pembayaran Tidak Valid";

        // send email
        $this->email->from('ahmaddjunaedi92@gmail.com','Ahmad Djunaedi');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);

        if($this->email->send())
		{
			$data = array(
			'status'	=> 'Dibatalkan'
			);
			$this->pemesanan->update($id_pemesanan, $data);

			$data = array(
				'valid_pembayaran'	=> 'Tidak Valid'
			);
			$this->pembayaran->update($id_pemesanan, $data);
			$this->session->set_flashdata('add', 'Status pembayaran berhasil diperbaharui');
			redirect('admin/validasi_pembayaran');
		}
		else
		{
			print_r($this->email->print_debugger());
		}
	}

}

/* End of file Validasi_pembayaran.php */
/* Location: ./application/modules/admin/controllers/Validasi_pembayaran.php */