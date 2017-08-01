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
		$this->template->sales('chat_sales','script_sales', $data);		
	}

	public function getChat()
	{
		$to_user = $this->input->post('from_id_user',TRUE); // chat to user
		$from_user = $this->session->userdata('id_user'); // chat from user
		// $id_last_chat = $this->input->post('id_last_chat'); // last chat id

		$where = "(((c.from_id_user = $from_user AND c.to_id_user = $to_user) OR (c.to_id_user = $from_user AND c.from_id_user = $to_user)))";
		$chat = $this->chat->get_all($where);
		$data = array(
			// 'id_last_chat'	=> $id_last_chat,
			'id_user'	=> $to_user,
			'chat'		=> $chat
		);
		$this->load->view('chat_box_sales', $data);
	}

	public function getChatAll()
	{
		$to_user = $this->input->post('from_id_user',TRUE); // chat to user
		$from_user = $this->session->userdata('id_user'); // chat from user
		// $id_last_chat = $this->input->post('id_last_chat'); // last chat id


		$where = "(((c.from_id_user = $from_user AND c.to_id_user = $to_user) OR (c.to_id_user = $from_user AND c.from_id_user = $to_user)))";
		$chat = $this->chat->get_all($where);
		
		$where2 = "(((c.to_id_user = $from_user AND c.from_id_user = $to_user) OR (c.from_id_user = $from_user AND c.to_id_user = $to_user)))";
		$get_id = $this->chat->get_last_id($where2);

		$data = array(
			// 'id_last_chat'	=> $get_id['id_chat'], // input hidden last id chat
			'id_user'	=> $to_user, //input hidden id user
			'chat'		=> $chat
		);
		$this->load->view('chat_box_sales', $data);		
	}

	public function getLastId()
	{
		$to_user = $this->input->post('from_id_user',TRUE); // chat to user
		$from_user = $this->session->userdata('id_user'); // chat from user
		// $id_last_chat = $this->input->post('id_last_chat'); // last chat id

		$where = "(((c.from_id_user = $from_user AND c.to_id_user = $to_user) OR (c.to_id_user = $from_user AND c.from_id_user = $to_user)))";
		
		$get_id = $this->chat->get_last_id($where);
		echo json_encode(array(
			'id'	=> $get_id->id_chat != '' ? $get_id->id_chat : $id_last_chat
		));
	}

	public function sendMessage()
	{
		$to_user = $this->input->post('to_id_user',TRUE); // chat to user
		$from_user = $this->session->userdata('id_user'); // chat from user
		// $id_last_chat = $this->input->post('id_last_chat'); // last chat id

		$data = array(
			'from_id_user'	=> $from_user,
			'to_id_user'	=> $to_user,
			// 'id_karyawan'	=> '1',
			'message'			=> $this->input->post('message')
		);
		$q = $this->chat->add($data);

		echo json_encode($q);
	}


}

/* End of file Chat.php */
/* Location: ./application/modules/sales/controllers/Chat.php */