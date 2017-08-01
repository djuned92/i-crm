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

		// if ($this->session->userdata('level') != 5)
		// {
		// 	redirect('pelanggan/before_login');
		// }
	}

	public function index()
	{
		$data['pemesanan'] = $this->pemesanan->status_diproses()->result();
		// return var_dump($data);
		$this->template->sales('validasi_pembayaran','script_sales',$data);
	}

	public function valid($id_pemesanan)
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
        $kode_pemesanan = $this->input->post('kode_pemesanan');
        $nama_wisata = $this->input->post('nama_wisata');
        $tgl_mulai = date_create($this->input->post('tgl_mulai'));
        $tgl_mulai = date_format($tgl_mulai,'d-m-y');
        $tgl_akhir = date_create($this->input->post('tgl_akhir'));
        $tgl_akhir = date_format($tgl_akhir, 'd-m-Y');
        $status = $this->input->post('status');
		$subject = "Pemesanan";
		$message = 
		"Hai $nama<br/><br/>
		Selamat pembayaran paket wisata anda telah lolos validasi, untuk detail paket wisata yang anda pesan berada dibawah ini,<br/<br/>
		Nama Pemesan : $nama <br/>
		Nama Paket Wisata : $nama_wisata <br/>
		Tanggal : $tgl_mulai s/d $tgl_akhir <br/>
		Lokasi Wisata : $lokasi <br/>
		Status : $status <br/><br/>
		Terimakasih telah melakukan pemesanan paket wisata melalui kami, Apabila anda ingin membatalkan pesanan paket wisata segera hubungi pihak sales kami dalam fitur “Chat” dalam web resmi.<br/>
		Setelah paket wisata berakhir, Anda juga dapat melakukan Ulasan mengenai pengalaman yang telah anda lewati menggunakan jasa Tour & travel kami. Kami sangat mengharapkan ulasan anda untuk perbaikan kami lebih baik.<br/><br/>

		Salam Hormat Kami, <br/><br/>
		PT. Persada Duta Beliton
		";

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
			redirect('sales/validasi_pembayaran');
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
        $kode_pemesanan = $this->input->post('kode_pemesanan');
        $nama_wisata = $this->input->post('nama_wisata');
		$subject = "Pemesanan";
		$message = 
		"Hai $nama <br/><br/>
		Detail Pesanan : <br/>
		Nama Pemesan : $nama<br/>
		Nama Paket Wisata : $nama_wisata<br/>
		Nomor Pemesanan : $kode_pemesanan<br/><br/>
		Mohon maaf pesanan paket wisata anda kami BATALKAN dikarenakan untuk saat ini paket wisata yang anda pesan tidak tersedia atau pembayaran anda gagal kami verifikasi.<br/>
		Mohon untuk konfirmasi ulang pembayaran anda, pastikan detail pembayaran yang anda isi telah benar.<br/>
		Apabila ada informasi yang belum jelas, bisa anda hubungi sales secara langsung melalui fitur “Chat” yang ada dalam web resmi kami.<br/><br/>
		Salam Hormat kami,<br/><br/>
		PT. Persada Duta Beliton
		";

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
			redirect('sales/validasi_pembayaran');
		}
		else
		{
			print_r($this->email->print_debugger());
		}
	}

}

/* End of file Validasi_pembayaran.php */
/* Location: ./application/modules/sales/controllers/Validasi_pembayaran.php */