<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_pemesanan'	=> 'pemesanan',
			'model_pelanggan'	=> 'pelanggan',
		));
		if ($this->session->userdata('level') != '4' && $this->session->userdata('login') != TRUE)
		{
			redirect('pelanggan/before_login');
		}
	}

	public function index($id_paket_wisata)
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

        $id_user = $this->session->userdata('id_user');
        $pelanggan = $this->pelanggan->get_by_id($id_user)->row();

        $to_email = $pelanggan->email;

		$date = date_create($this->input->post('tgl_pemesanan'));
		$format_tgl_pemesanan = date_format($date, 'dmY');
		$kode_pemesanan = $format_tgl_pemesanan.''.$this->random_kode_pememsanan();
		$date = date_create($this->input->post('tgl_pemesanan'));
		$tgl_pemesanan = date_format($date,'Y-m-d');
		$nama_wisata = $this->input->post('nama_wisata');

		$subject = 'Pemesanan Paket Wisata';
		$message = 
		"Hai $pelanggan->nama <br/>
		Terima kasih telah melakukan pemesanan paket wisata pada kami, untuk detail pesanan adalah sebagai berikut :<br/>
		Nama Pemesan : $pelanggan->nama<br/>
		Nomor Pemesanan : $kode_pemesanan<br/>
		Nama Paket Wisata : $nama_wisata<br> 
		Pesanan anda segera kami proses, mohon menunggu email balasan dari kami 3x24 jam untuk proes lebih lanjut.<br/><br/>
		Apabila tidak ada email balasan dari kami dalam waktu 3x24jam, anda bisa menggunakan fitur Chat dalam website resmi kami untuk terhubung langsung dengan admin perihal status pemesanan anda.<br/><br/>
		Atas perhatiannya kami ucapkan terima kasih <br/><br/><br/>
		PT. Persada Duta Beliton";

		$this->email->from('ahmaddjunaedi92@gmail.com','Ahmad Djunaedi');
		$this->email->to($to_email);
		$this->email->subject($subject);
		$this->email->message($message);

		if($this->email->send())
		{
			$data = array(
				'id_pelanggan'		=> $this->input->post('id_pelanggan'),
				'id_paket_wisata'	=> $this->input->post('id_paket_wisata'),
				'kode_pemesanan'	=> $kode_pemesanan,
				'tgl_pemesanan'		=> $tgl_pemesanan,
				'harga_pemesanan'	=> $this->input->post('harga_pemesanan'),
				'status'			=> 'Menunggu'
			);
			$this->pemesanan->add($data);
			$this->session->set_flashdata('add', 'Pemesanan berhasil');
			redirect('pelanggan/pemesanan');
		}
		else
		{
			print_r($this->email->print_debugger());
		}
	}

	public function random_kode_pememsanan($length = 4)
	{
		return substr(str_shuffle(implode(array_merge(range(0,9), range('A', 'Z'), range('a', 'z')))), 0, $length);
	}

}

/* End of file Pesan.php */
/* Location: ./application/modules/pelanggan/controllers/Pesan.php */