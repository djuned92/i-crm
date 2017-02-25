<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pembayaran extends CI_Model {

	public function check_pembayaran($id_pemesanan)
	{
		return $this->db->select('p.*')
						->from('pembayaran as p')
						->where('p.id_pemesanan', $id_pemesanan)
						->get();
	}
	
	public function add($data)
	{
		$this->db->insert('pembayaran',$data);
	}

	public function update($id_pemesanan, $data)
	{
		$this->db->where('id_pemesanan',$id_pemesanan)->update('pembayaran',$data);
	}

}

/* End of file Model_pembayaran.php */
/* Location: ./application/models/Model_pembayaran.php */