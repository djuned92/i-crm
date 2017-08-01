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
		// echo "<pre>";
		// return var_dump($data);
		// echo "</pre";
		$this->template->admin('data_pemesanan','script_admin',$data);
	}

	public function tersedia($id_pemesanan)
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
        $harga_pemesanan = number_format($Harga = $this->input->post('harga_pemesanan'),0,'.','.');
        $norek = $this->input->post('norek_perusahaan');

		$subject = "Pemesanan Paket Wisata";
		$message = 
		"Hai $nama <br/>
		Selamat pesanan paket wisata kamu telah siap. Mohon untuk segera melakukan pembayaran untuk detail pesanan kamu dibawah ini:<br/>
		Nama Pemesan : $nama <br/>
		Nomor Pemesanan : $kode_pemesanan <br/><br/>
		Nama Paket Wisata : $nama_wisata<br> 
		Tanggal : $tgl_mulai s/d $tgl_akhir<br/>
		Harga Paket Wisata : $harga_pemesanan IDR<br/><br/>
		Pembayaran dapat dilakukan melalui rekening dibawah ini:<br/>
		Nomor Rekening : $norek<br/>
		Nama Bank : BCA<br/>
		Atas Nama : PT. Persada Duta Beliton<br/><br/>
		Apabila Saudara telah melakukan pembayaran, mohon untuk segera mengkonfirmasi pembayaran anda melalui fitur <b>Konfirmasi Pembayaran</b> untuk proses lebih lanjut.<br/>
		Atas perhatiannya kami ucapkan terima kasih <br/><br/><br/>
		PT. Persada Duta Beliton";

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
			$this->pemesanan->update($id_pemesanan, $data);
			$this->session->set_flashdata('update', 'Status pemesanan berhasil diperbaharui');
			redirect('admin/data_pemesanan');
		}
		else
		{
			print_r($this->email->print_debugger());
		}
	}

	public function tidak_tersedia($id_pemesanan)
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
		Apabila ada informasi yang belum jelas, bisa anda hubungi admin secara langsung melalui fitur “Chat” yang ada dalam web resmi kami.<br/><br/>
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
			$this->session->set_flashdata('update', 'Status pemesanan berhasil diperbaharui');
			redirect('admin/data_pemesanan');
		}
		else
		{
			print_r($this->email->print_debugger());
		}

	}

	public function delete($id_pemesanan)
	{
		$this->pemesanan->delete($id_pemesanan);
		$this->session->set_flashdata('delete', 'Data pemesanan berhasil dihapus');
		redirect('admin/data_pemesanan');
	}

}

/* End of file Data_pemesanan.php */
/* Location: ./application/modules/admin/controllers/Data_pemesanan.php */