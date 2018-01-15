<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Taxonomy extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function add($data) {
		return $this->db->insert('category', $data);
	}
	
	public function getById($id) {
		return $this->db->where('ID', $id)->get('category')->row();
	}
	
	public function ajaxSearch($keyword) {
		return $this->db->like('name', $keyword)->get('category')->result();
	}
	
	public function getAlls() {
		return $this->db->get('category')->result();
	}
	
	public function getAll() {
		return $this->db->where('parent', '')->get('category')->result();
	}
	
	public function getByParent($id) {
		return $this->db->where('parent', $id)->get('category')->result();
	}
	
	public function delete($id) {
		$result = $this->db->where('ID', $id)->delete('category');
		
		if ( ! empty($parent = $this->getByParent($id))) {
			foreach ($parent as $par) {
				$this->delete($par->ID);
			}
		}
		
		return (bool) $result;
		
	}

}

/* End of file Taxonomy.php */
/* Location: ./application/models/Taxonomy.php */
