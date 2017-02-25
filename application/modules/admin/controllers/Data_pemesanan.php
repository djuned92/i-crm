<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pemesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_pemesanan' 		=> 'pemesanan',
		));

		// if ($this->session->userdata('level') != 1)
		// {
		// 	redirect('pelanggan/before_login');
		// }
	}
	public function index()
	{
		$data['pemesanan'] = $this->pemesanan->get_all()->result();
		$this->template->admin('data_pemesanan','script_admin',$data);
	}

	public function tersedia($id_pemesenan)
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
		$subject = "Pemesanan";
		$message = "Pesanan paket wisata tersedia segera melakukan pembayaran";

        // send email
        $this->email->from('ahmaddjunaedi92@gmail.com','Ahmad Djunaedi');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);

        if($this->email->send())
		{
			$data = array(
			'status'	=> 'Segera Dibayar'
			);
			$this->pemesanan->update($id_pemesenan, $data);
			$this->session->set_flashdata('update', 'Status pemesanan berhasil diperbaharui');
			redirect('admin/data_pemesanan');
		}
		else
		{
			print_r($this->email->print_debugger());
		}
	}

	public function tidak_tersedia($id_pemesenan)
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
		$subject = "Pemesanan";
		$message = "Pesanan paket wisata tidak tersedia";

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
			$this->pemesanan->update($id_pemesenan, $data);
			$this->session->set_flashdata('update', 'Status pemesanan berhasil diperbaharui');
			redirect('admin/data_pemesanan');
		}
		else
		{
			print_r($this->email->print_debugger());
		}

	}

	public function delete($id_pemesenan)
	{
		$this->pemesanan->delete($id_pemesenan);
		$this->session->set_flashdata('delete', 'Data pemesanan berhasil dihapus');
		redirect('admin/data_pemesanan');
	}

}

/* End of file Data_pemesanan.php */
/* Location: ./application/modules/admin/controllers/Data_pemesanan.php */