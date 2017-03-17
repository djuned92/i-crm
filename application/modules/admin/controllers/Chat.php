<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'model_user'	=> 'user',
			'model_chat'	=> 'chat'
		));
	}

	public function index()
	{
		$id_user_login = $this->session->userdata('id_user');
		$where  = "u.id_user != $id_user_login";
		$data['user'] = $this->user->get_all($where)->result();
		// return var_dump($data);
		$this->template->admin('chat_admin','script_admin', $data);		
	}

	public function getChat()
	{
		$to_user = $this->input->post('id_user',TRUE); // chat to user
		$from_user = $this->session->userdata('id_user'); // chat from user
		$id_last_chat = $this->input->post('id_last_chat'); // last chat id

		$where = "(((c.id_karyawan = $from_user AND c.id_pelanggan = $to_user) OR (c.id_pelanggan = $from_user AND c.id_karyawan = $to_user)))";
		$chat = $this->chat->get_all($where);
		$data = array(
			'id_last_chat'	=> $id_last_chat,
			'id_user'	=> $to_user,
			'chat'		=> $chat
		);
		$this->load->view('chat_box_admin', $data);
	}

	public function getChatAll()
	{
		$to_user = $this->input->post('id_user'); // chat to user
		$from_user = $this->session->userdata('id_user'); // chat from user
		$id_last_chat = $this->input->post('id_last_chat'); // last chat id


		$where = "(((c.id_karyawan = $from_user AND c.id_pelanggan = $to_user) OR (c.id_pelanggan = $from_user AND c.id_karyawan = $to_user)))";
		$chat = $this->chat->get_all($where);
		
		$where2 = "(((c.id_karyawan = $from_user AND c.id_pelanggan = $to_user) OR (c.id_pelanggan = $from_user AND c.id_karyawan = $to_user)))";
		$get_id = $this->chat->get_last_id($where2);

				
		$data = array(
			'id_last_chat'	=> $get_id['id_chat'], // input hidden last id chat
			'id_user'	=> $to_user, //input hidden id user
			'chat'		=> $chat
		);

		
		$this->load->view('chat_box_admin', $data);		
	}

	public function getLastId()
	{
		$to_user = $this->input->post('id_user',TRUE); // chat to user
		$from_user = $this->session->userdata('id_user'); // chat from user
		$id_last_chat = $this->input->post('id_last_chat'); // last chat id

		$where = "(((c.id_karyawan = $from_user AND c.id_pelanggan = $to_user) OR (c.id_pelanggan = $from_user AND c.id_karyawan = $to_user)))";
		
		$get_id = $this->chat->get_last_id($where);
		echo json_encode(array(
			'id'	=> $get_id->id_chat != '' ? $get_id->id_chat : $id_last_chat
		));
	}

	public function sendMessage()
	{
		$to_user = $this->input->post('id_user',TRUE); // chat to user
		$from_user = $this->session->userdata('id_user'); // chat from user

		$data = array(
			'id_pelanggan'	=> $from_user,
			'id_karyawan'	=> $to_user,
			// 'id_karyawan'	=> '1',
			'isi'			=> $this->input->post('isi')
		);
		$q = $this->chat->add($data);

		if($q)
		{
			$rs = 1;
		}
		else
		{
			$rs = 2;
		}
		echo json_encode(array(
			'result'	=> $rs
		));
	}

}

/* End of file Chat.php */
/* Location: ./application/modules/admin/controllers/Chat.php */