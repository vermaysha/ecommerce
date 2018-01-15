<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->template->setOptions($this->options);
		$this->load->model(['products', 'taxonomy']);
	}
	
	public function get($id) {
		if (!$this->input->is_ajax_request()) {
			redirect('product');
		}
		
		if (empty($row = $this->products->get($id))) {
			echo json_encode([]);
			return false;
		}
		
		$category = $this->taxonomy->getById($row->category);
		$product = [
			'ID' => $row->ID,
			'name' => $row->name,
			'description' => $row->description,
			'category' => [
				'ID' => $category->ID,
				'name' => $category->name
			],
			'price' => $row->price,
			'photo' => is_file(FCPATH.'assets/thumbnail/'.$row->photo) ? 
				'assets/thumbnail/' . $row->photo : 
				'assets/photo/' . $row->photo
		];
		echo json_encode($product);
		return true;
	}
	
	public function add() {
		if (!$this->input->is_ajax_request()) {
			redirect('product');
		}
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Product Name', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('content', 'Product Description', 'trim|required|max_length[800]');
		$this->form_validation->set_rules('category_id', 'Product Category', 'trim|required|is_natural_no_zero');
		$this->form_validation->set_rules('price', 'Product Price', 'trim|required|integer');
		
		if ($this->form_validation->run() == FALSE) {
			$json['status']  = false;
			$json['message'] = $this->form_validation->error_array();
			echo json_encode($json);
			return true; // Break the program
		}
		
		$config['upload_path']      = FCPATH . 'assets/product/';
		$config['allowed_types']    = 'gif|jpg|jpeg|png';
		$config['file_ext_tolower'] = true;
		$config['file_name']        = time(); // Get the current time in unix style
		$config['max_size']         = '10240000'; //10 GB
		$config['max_filename']     = 30;

		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('image')) {
			$json['status']  = false;
			$json['message'] = $this->upload->error_msg;
			echo json_encode($json);
			return true; // Break the program
		}
		
		$uploadResult = $this->upload->data();
		
		$insertData = [
			'name'        => $this->input->post('name'),
			'description' => $this->input->post('content'),
			'price'       => $this->input->post('price'),
			'photo'       => $uploadResult['file_name'],
			'category'    => $this->input->post('category_id')
		];
		
		
		if (extension_loaded('gd')) {
			$image['image_library']  = 'gd2';
			$image['source_image']   = $uploadResult['full_path'];
			$image['new_image']      = FCPATH . '/assets/thumbnail/';
			$image['create_thumb']   = FALSE;
			$image['quality']        = '50%';
			$image['maintain_ratio'] = TRUE;
			$image['width']          = 700;
			$image['height']         = 500;

			$this->load->library('image_lib', $image);
			if ( ! $this->image_lib->resize()) {
				$json['status']  = false;
				$json['message'] = $this->image_lib->error_msg;
				echo json_encode($json);
				return true;
			}
		}
		
		if ( ! $this->products->insert($insertData)) {
			$json['status']  = false;
			$json['message'][] = 'Tidak dapat memasukan data produk ke database !';
			echo json_encode($json);
			return true;
		}
		
		$json['status']    = true;
		$json['message'][] = 'Data produk telah ditambahkan !';
		
		echo json_encode($json);
		return true;
	}
	
	public function delete($id) {
		if (!$this->input->is_ajax_request()) {
			redirect('product');
		}
		
		if (($cat = $this->products->get($id)) && $this->products->delete($id)) {
			if (is_file($file = FCPATH . 'assets/thumbnail/'. $cat->photo)) {
				@unlink($file);
			} else {
				@unlink(FCPATH . 'assets/product/'. $cat->photo);
			}
			
			$json['status'] = true;
			$json['message'] = 'Produk telah dihapus dari daftar !';
			echo json_encode($json);
			return true;
		}
		
		$json['status'] = false;
		$json['message'] = 'Produk tidak ditemukan dari daftar !';
		echo json_encode($json);
		return true;
	}
	
	public function index(){
		$this->load->library('pagination');
		$page = $this->input->get('page');
		$limit = 10;
		$offset = 0;
		
		if (!empty($page)) {
			$offset = $page * $limit;
		}
		
		$config['base_url'] = base_url('product');
		$config['total_rows'] = $this->products->countAll();
		$config['per_page'] = $limit;
		$config['num_links'] = 2;
		$config['use_page_numbers'] = true;
		$config['page_query_string'] = true;
		$config['query_string_segment'] = 'page';
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
		
		$product = [];
		
		foreach ($this->products->getAll($limit, $offset) as $row) {
			$category = $this->taxonomy->getById($row->category);
			$product[] = [
				'ID' => $row->ID,
				'name' => $row->name,
				'description' => substr($row->description, 0, 25),
				'category' => [
					'ID' => $category->ID,
					'name' => $category->name
				],
				'price' => $row->price,
				'photo' => is_file(FCPATH.'assets/thumbnail/'.$row->photo) ? 
							'assets/thumbnail/' . $row->photo : 
							'assets/photo/' . $row->photo
			];
		}
		
		if ($this->input->is_ajax_request()) {
			echo json_encode($product);
			return true;
		}
		
		$args['product'] = $product;
		$args['category'] = $this->taxonomy->getAlls();
		$args['title'] = 'Manage Product';
		$this->template->dashboard('product/manage', $args);
	}

}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */
