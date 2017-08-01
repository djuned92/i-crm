<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_promosi extends CI_Model {

	public function get_all()
	{
		return $this->db->select('p.*, pw.*')
						->from('promosi as p')
						->join('paket_wisata as pw','pw.id_paket_wisata = p.id_paket_wisata')
						->order_by('p.id_promosi','DESC')
						->get();
	}

	public function get_by_id($id_paket_wisata)
	{
		return $this->db->select('p.*, pw.*')
						->from('promosi as p')
						->join('paket_wisata as pw','pw.id_paket_wisata = p.id_paket_wisata')
						->limit(1)
						->where('p.id_paket_wisata',$id_paket_wisata)
						->get();
	}

	public function check_promosi($id_paket_wisata)
	{
		return $this->db->select('p.*, pw.*')
						->from('promosi as p')
						->join('paket_wisata as pw','pw.id_paket_wisata = p.id_paket_wisata')
						->where('p.id_paket_wisata',$id_paket_wisata)
						->get();
		// if ($q->num_rows() > 0)
		// {
		// 	return TRUE;
		// }
		// else
		// {
		// 	return FALSE;
		// }
	}

	public function update($id_paket_wisata, $data)
	{
		$this->db->where('id_paket_wisata', $id_paket_wisata)->update('promosi',$data);
	}

	public function add($data)
	{
		$this->db->insert('promosi',$data);
	}
	
}

/* End of file Model_promosi.php */
/* Location: ./application/models/Model_promosi.php */