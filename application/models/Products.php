<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function get($id) {
		return $this->db->where('ID', $id)->get('product')->row();
	}
	
	public function getAllByCat($id, $limit, $offset) {
		return $this->db->order_by('ID', 'DESC')->limit($limit, $offset)->where('category', $id)->get('product')->result();
	}
	
	public function delete($id) {
		return $this->db->where('ID', $id)->delete('product');
	}
	
	public function countAll() {
		return $this->db->get('product')->num_rows();
	}
	
	public function countAllByCat($id) {
		return $this->db->where('category', $id)->get('product')->num_rows();
	}
	
	public function getAll($limit, $offset) {
		return $this->db->order_by('ID', 'DESC')->limit($limit, $offset)->get('product')->result();
	}
	
	public function insert($data) {
		return $this->db->insert('product', $data);
	}
}

/* End of file Catalog.php */
/* Location: ./application/models/Catalog.php */
