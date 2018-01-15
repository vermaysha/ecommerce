<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['users']);
		$this->template->setOptions($this->options);
	}

	public function index() {
		$this->auth->redIfNotLogin();
		$args['title'] = 'Dashboard';
		$this->template->dashboard('overview', $args);
	}
	
	public function login() {
		$args = [];
		$this->auth->redIfLogin();
		
		if ($this->input->post('submit')) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_dash');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if ($this->form_validation->run() == TRUE) {
				$user = $this->input->post('username');
				$pass = $this->input->post('password');
				
				if ( ! ($userData = $this->users->getUser($user))) {
					$args['error'][] = 'Username Tidak ditemukan !';
				} elseif ( ! password_verify($pass, $userData->password)) {
					$args['error'][] = 'Kata Sandi Salah !';
				} else {
					$this->auth->save($userData);
					redirect('dashboard');
				}
			} else {
				$args['errors'] = $this->form_validation->error_array();
			}
		}
		
		$this->template->login($args);
	}
	
	public function logout() {
		$this->auth->redIfNotLogin();
		$this->auth->logout();
		redirect('dashboard/login');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
