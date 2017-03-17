<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_paket_wisata extends CI_Model {

	public function get_all()
	{
		return $this->db->select('pw.*')
						->from('paket_wisata as pw')
						->order_by('pw.id_paket_wisata','DESC')
						->get();
	}

	public function get_limit_4()
	{
		return $this->db->select('pw.*')
						->from('paket_wisata as pw')
						->order_by('pw.id_paket_wisata','RANDOM')
						->limit(4)
						->get();
	}

	public function get_by_id($id_paket_wisata)
	{
		return $this->db->select('pw.*')
					->from('paket_wisata as pw')
					->limit(1)
					->where('pw.id_paket_wisata', $id_paket_wisata)
					->get();
	}

	public function paket_wisata_list($limit, $start)
	{
		return $this->db->select('pw.*')
						->from('paket_wisata as pw')
						->order_by('pw.id_paket_wisata','DESC')
						->limit($start, $limit)
						->get();
	}

	public function count_all()
	{
		return $this->db->count_all('paket_wisata');
	}

	public function add($data)
	{
		$this->db->insert('paket_wisata',$data);
	}
	
	public function update($id_paket_wisata, $data)
	{
		$this->db->where('id_paket_wisata', $id_paket_wisata)->update('paket_wisata',$data);
	}

	public function delete($id_paket_wisata)
	{
		$this->db->where('id_paket_wisata',$id_paket_wisata)->delete('paket_wisata');
	}

}

/* End of file Model_paket_wisata.php */
/* Location: ./application/models/Model_paket_wisata.php */