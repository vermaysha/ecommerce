<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public $args = [];
	public function __construct() {
		parent::__construct();
		$this->template->setOptions($this->options);
		$this->load->model(['taxonomy', 'products']);
		
		$category = [];
		
		foreach ($this->taxonomy->getAll() as $parent) {
			$childs = [];
			foreach ($this->taxonomy->getByParent($parent->ID) as $child) {
				$childs[] = [
					'ID' => $child->ID,
					'name' => $child->name
				];
			}
			$category[] = [
				'ID' => $parent->ID,
				'name' => $parent->name,
				'childs' => $childs
			];
		}
		$this->args['category'] = $category;
	}
	
	public function category($id = null) {
		if (empty($id) OR empty($cat = $this->taxonomy->getById($id))) {
			redirect('main');
		}
		
		$this->load->library('pagination');
		$limit = 12;
		$offset = 0;
		
		if (!empty($page)) {
			$offset = $page * $limit;
		}
		
		$config['base_url'] = base_url('main/index/');
		$config['total_rows'] = $this->products->countAllbyCat($id);
		$config['per_page'] = 12;
		$config['num_links'] = 3;
		$config['use_page_numbers'] = true;
		// $config['page_query_string'] = false;
		// $config['query_string_segment'] = 'page';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li'>
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li'>
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		
		$products = [];
		
		foreach ($this->products->getAllByCat($id, $limit, $offset) as $row) {
			$p = strrev((string) $row->price);
			$price = '';
			for ($i=0; $i < strlen($p); $i++) { 
				$price .= $p[$i];
				if (strlen(str_replace('.', '', $price)) % 3 == 0 ) {
					$price .= '.';
				}
			}
			
			$price = trim(strrev($price), '.');
			$products[] = [
				'ID' => $row->ID,
				'name' => $row->name,
			'summary' => substr($row->description, 0, 50),
			'price' => $price,
			'photos' => is_file(FCPATH.'assets/thumbnail/'.$row->photo) ? 
				'assets/thumbnail/' . $row->photo : 
				'assets/photo/' . $row->photo
			];
		}
		
		$this->args['categoryLabel'] = $cat->name;
		$this->args['products'] = $products;
		$this->args['pagination'] = $this->pagination->create_links();
		$this->args['title'] = 'Menampilkan Kategori '.$cat->name;
		$this->template->main('main', $this->args);
	}
	
	public function detail($id = null) {
		if (empty($id) OR empty($post = $this->products->get($id))) {
			redirect('main');
		}
		
		$p = strrev((string) $post->price);
		$price = '';
		for ($i=0; $i < strlen($p); $i++) { 
			$price .= $p[$i];
			if (strlen(str_replace('.', '', $price)) % 3 == 0 ) {
				$price .= '.';
			}
		}
		
		$price = trim(strrev($price), '.');
		
		$this->args['product'] = [
			'name' => $post->name,
			'price' => $price,
			'description' => $post->description,
			'photo' => ('assets/product/'.$post->photo)
		];
		$this->args['title'] = $post->name;
		$this->template->main('detail', $this->args);
	}
	
	public function index($page = 0) {
		$this->load->library('pagination');
		$limit = 12;
		$offset = 0;
		
		if (!empty($page)) {
			$offset = $page * $limit;
		}
		
		$config['base_url'] = base_url('main/index/');
		$config['total_rows'] = $this->products->countAll();
		$config['per_page'] = 12;
		$config['num_links'] = 3;
		$config['use_page_numbers'] = true;
		// $config['page_query_string'] = false;
		// $config['query_string_segment'] = 'page';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li'>
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li'>
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		
		$products = [];
		
		foreach ($this->products->getAll($limit, $offset) as $row) {
			$p = strrev((string) $row->price);
			$price = '';
			for ($i=0; $i < strlen($p); $i++) { 
				$price .= $p[$i];
				if (strlen(str_replace('.', '', $price)) % 3 == 0 ) {
					$price .= '.';
				}
			}
			
			$price = trim(strrev($price), '.');
			$products[] = [
				'ID' => $row->ID,
				'name' => $row->name,
			'summary' => substr($row->description, 0, 50),
			'price' => $price,
			'photos' => is_file(FCPATH.'assets/thumbnail/'.$row->photo) ? 
				'assets/thumbnail/' . $row->photo : 
				'assets/photo/' . $row->photo
			];
		}
		
		$this->args['products'] = $products;
		$this->args['pagination'] = $this->pagination->create_links();
		$this->template->main('main', $this->args);
	}
}
