<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('taxonomy');
		$this->template->setOptions($this->options);
	}
	
	public function search($keyword) {
		if (!$this->input->is_ajax_request()) {
			redirect('category');
		}
		$arr = [];
		$arr['query'] = $keyword;
		$arr['suggestions'][0] = [
			'ID' => '',
			'name' => '',
			'value'	=> ''
		];
		$i = 0;
		foreach($this->taxonomy->ajaxSearch($keyword) as $row)
		{
			$arr['suggestions'][$i] = [
				'ID' => $row->ID,
				'name' => $row->name,
				'value'	=>$row->name
			];
			$i++;
		}
		
		echo json_encode($arr);
	}

	public function index()
	{
		$category = [];
		
		foreach ($this->taxonomy->getAll() as $taxo) {
			$taxoChild = [];
			foreach ($this->taxonomy->getByParent($taxo->ID) as $child) {
				$taxoChild[] = [
					'ID' => $child->ID,
					'name' => $child->name
				];
			}
			$category[] = [
				'ID' => $taxo->ID,
				'name' => $taxo->name,
				'parent' => $taxoChild
			];
		}
		
		$args['category'] = $category;
		$args['title'] = 'Category';
		$this->template->dashboard('category', $args);
	}
	
	public function get($id) {
		if (!$this->input->is_ajax_request()) {
			redirect('category');
		}
		
		echo json_encode($this->taxonomy->getById($id));
	}
	
	public function refresh_data() {
		if (!$this->input->is_ajax_request()) {
			redirect('category');
		}
		
		$category = [];
		
		foreach ($this->taxonomy->getAll() as $taxo) {
			$taxoChild = [];
			foreach ($this->taxonomy->getByParent($taxo->ID) as $child) {
				$taxoChild[] = [
					'name' => $child->name
				];
			}
			$category[] = [
				'name' => $taxo->name,
				'parent' => $taxoChild
			];
		}
		
		echo json_encode($category);
	}
	
	public function add() {
		$this->load->library('form_validation');
		if ($this->input->post('submit') == 'submit') {
			$this->form_validation->set_rules('name', 'Category Name', 'trim|required');
			if ($this->input->post('parent')) {
				$this->form_validation->set_rules('parent', 'Category Parent', 'trim|is_natural_no_zero');
			}
			
			if ($this->form_validation->run()) {
				$name = $this->input->post('name');
				$parent = $this->input->post('parent');

				$data = [
					'name' => $name,
					'parent' => $parent
				];
				$this->taxonomy->add($data);
			}
		}
		
		if ($this->input->is_ajax_request()) {
			echo  json_encode([
				'message' => empty($error = $this->form_validation->error_array()) ? [] : $error
			]);
			exit;
		}

		
		if ( ! $this->input->is_ajax_request()) {
			redirect('category');
		}
	}
	
	public function delete($id) {
		if (!$this->input->is_ajax_request()) {
			redirect('category');
		}
		
		echo json_encode(['status' => (bool) $this->taxonomy->delete($id)]);
	}

}

/* End of file Category.php */
/* Location: ./application/controllers/Category.php */
