<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personalisasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_personalisasi'	=> 'personalisasi',
			'model_pelanggan'		=> 'pelanggan'
		));
	}

	public function index()
	{
		$data['pelanggan'] = $this->pelanggan->get_all()->result();
		$this->template->marketing('personalisasi','script_marketing',$data);
	}

	public function add($id_pelanggan = NULL)
	{
		$this->form_validation->set_rules('isi', 'Isi', 'required');
		if ($this->form_validation->run() == FALSE) 
		{
			$data['pelanggan'] = $this->pelanggan->get_pelanggan_personalisasi($id_pelanggan)->row();
			$this->template->marketing('personalisasi_add','script_marketing',$data);
		} 
		else 
		{
			$this->load->library('email');

			// configure email setting
			$config['protocol'] = 'smtp';
	        $config['smtp_host'] = 'ssl://smtp.gmail.com';
	        $config['smtp_port'] = '465';
	        $config['smtp_user'] = 'ahmaddjunaedi92@gmail.com'; //bangzafran445@gmail.com
	        $config['smtp_pass'] = 'junjunned!92'; //bastol1234567 
	        // $config['protocol'] = 'mail';
	        $config['mailpath'] = '/usr/sbin/sendmail';
	        $config['mailtype'] = 'html';
	        $config['charset'] = 'iso-8859-1';
	        $config['wordwrap'] = TRUE;
	        $config['newline'] = "\r\n"; //use double quotes
	        $this->email->initialize($config);

	        $to_email = $this->input->post('email');
	        $nama = $this->input->post('nama');
			$subject = "Harga Special Dihari lahir anda";
			$message = 
			"Hai <br/>
			Kami dari Persada Tour & Travel mengucapkan Selamat Ulang Tahun kepada Saudara: <b>$nama</b> Semoga anda selalu sehat dan berbahagia<br/>
			Untuk merayakan hari yang berbahagia ini, Kami memberikan potongan harga berlibur khusus untuk anda yang berulang tahun hari ini.<br/>
			Silahkan anda cek dalam website resmi kami pada www.persadatourtravel.com.<br/>
			Kesempatan ini hanya berlaku hari ini loh, segera pesan sekarang agar anda tidak menyesal!!<br/><br/>

			Salam Hormat Kami, <br/><br/><br/>
			PT. Persada Duta Beliton";

	        // send email
	        $this->email->from('ahmaddjunaedi92@gmail.com','Ahmad Djunaedi');
	        $this->email->to($to_email);
	        $this->email->subject($subject);
	        $this->email->message($message);

	        if($this->email->send())
			{
				$data = array(
				'id_pelanggan'	=> $this->input->post('id_pelanggan'),
				'nama'			=> $this->input->post('nama'),
				'tgl_personal'	=> $this->input->post('tgl_personal'),
				'isi'			=> $this->input->post('isi')
			);
				$this->personalisasi->add($data);
				$this->session->set_flashdata('add', 'Pelanggan berhasil dipersonalisasi');
				redirect('marketing/personalisasi');
			}
			else
			{
				print_r($this->email->print_debugger());
			}
		}
	}

}

/* End of file Personalisasi.php */
/* Location: ./application/modules/marketing/controllers/Personalisasi.php */