<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promosi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_paket_wisata'	=> 'paket_wisata',
			'model_promosi'			=> 'promosi',
			'model_pelanggan'		=> 'pelanggan'
		));

		$this->load->helper('text');

		// if ($this->session->userdata('level') != 2)
		// {
		// 	redirect('pelanggan/before_login');
		// }
	}

	public function index()
	{
		$data['promosi'] = $this->promosi->get_all()->result();
		$this->template->marketing('promosi','script_marketing',$data);
	}

	public function add($id_paket_wisata = NULL)
	{
		$this->form_validation->set_rules('nama', 'Nama Promosi', 'required'); // trigger bootstrap formvalidation
		if ($this->form_validation->run() == FALSE) 
		{
			$data['paket_wisata'] = $this->paket_wisata->get_all()->result();
			$this->template->marketing('promosi_add','script_marketing', $data);
		} 
		else 
		{
			// $this->send_email();
			$data_promosi = array (
				'id_paket_wisata'=> $this->input->post('id_paket_wisata'),
				'nama'			=> $this->input->post('nama'),
				'isi'			=> $this->input->post('isi'),
				'tgl_promosi'	=> $this->input->post('tgl_promosi'),
				'potongan_harga'	=> $this->input->post('potongan_harga')
			);
			$this->promosi->add($data_promosi);
			$this->session->set_flashdata('add', 'Promosi paket wisata berhasil ditambah');
			redirect('marketing/promosi');
			
			// if(!$this->email->send())
			// {
			// 	print_r($this->email->print_debugger());
			// }
		}
	}

	public function update($id_paket_wisata = NULL)
	{
		$this->form_validation->set_rules('nama', 'Nama Promosi', 'required'); // trigger bootstrap formvalidation
		if ($this->form_validation->run() == FALSE) 
		{
			$data['promosi'] = $this->promosi->get_by_id($id_paket_wisata)->row();
			// return var_dump($data);
			$this->template->marketing('promosi_edit','script_marketing', $data);
		} 
		else 
		{
			$id_paket_wisata = $this->input->post('id_paket_wisata');
			$data_promosi = array (
				'id_paket_wisata'=> $id_paket_wisata,
				'nama'			=> $this->input->post('nama'),
				'isi'			=> $this->input->post('isi'),
				'tgl_promosi'	=> $this->input->post('tgl_promosi'),
				'potongan_harga'	=> $this->input->post('potongan_harga')
			);
			$this->promosi->update($id_paket_wisata, $data_promosi);
			$this->session->set_flashdata('update', 'Promosi paket wisata berhasil ditambah');
			redirect('marketing/promosi');
		}	
	}

	public function paket_wisata($id_paket_wisata)
	{
		$data = $this->paket_wisata->get_by_id($id_paket_wisata)->row();
		echo json_encode($data);
	}

	public function send_email()
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

      	$id_paket_wisata = $this->input->post('id_paket_wisata');
		$paket_wisata = $this->paket_wisata->get_by_id($id_paket_wisata)->row();
		$nama_wisata = $paket_wisata->nama_wisata;
		$harga = $paket_wisata->harga;

		$tgl = date_create($this->input->post('tgl_promosi'));
		$tgl_promosi = date_format($tgl, 'd-m-Y');
        $potongan_harga = $this->input->post('potongan_harga');
        $isi = $this->input->post('isi');
        $disc = $harga * ($potongan_harga/100);
        $harga_disc = $harga - $disc;

		$subject = "Promosi ".$nama_wisata;
		$message = "
		Hai pelanggan PT. Persada Duta Beliton, nikmatilah potongan harga sebesar $potongan_harga %, untuk paket wisata $nama_wisata<br/>
		Dari Harga $harga IDR menjadi $harga_disc IDR<br/>
		$isi<br/>
		promo ini berlaku tanggal $tgl_promosi <br/><br/>
		Apabila nda ingin informasi lebih lanjut bisa menghubungi kami lewat fitur chat dalam aplikasi.<br/>
		Salam Hormat kami,<br/><br/><br/>
		PT. Persada Duta Beliton
		";

        // send email
        $pelanggan = $this->pelanggan->get_all()->result();
        foreach($pelanggan as $r)
        {
        	$this->email->clear();
        	$this->email->from('ahmaddjunaedi92@gmail.com','Ahmad Djunaedi');
	        $this->email->to($r->email);
	        $this->email->subject($subject);
	        $this->email->message($message);
	        $this->email->send();
    	}
    	$this->session->set_flashdata('blast', 'Berhasil blast email kesemua pelanggan PT. Persada Duta Beliton');
    	redirect('marketing/promosi');
	}

}

/* End of file Promosi.php */
/* Location: ./application/modules/marketing/controllers/Promosi.php */