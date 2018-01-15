<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Ashary Vermaysha <asharyver13@gmail.com>
 * @copyright Copyright (C) 2018 Ashary Vermaysha
 */
class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->template->setOptions($this->options);
	}

	public function index()
	{
		$this->load->library('form_validation');
		if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
			
			$this->form_validation->set_rules('site_name', 'Nama Situs', 'trim|required');
			$this->form_validation->set_rules('site_desc', 'Deskripsi Situs', 'trim|required');
			
			if ($this->form_validation->run()) {
				$data = [
					'site_name' => $this->input->post('site_name'),
					'site_desc' => $this->input->post('site_desc')
				];
				$this->options->update($data);
				$this->session->set_flashdata('success', 'Peraturan sudah diubah');
			}
		}
		
		if ($this->input->is_ajax_request()) {
			$error = [];
			
			foreach ($this->form_validation->error_array() as $i => $err) {
				$error[] = $err;
			}
			echo json_encode([								
				'message' => (empty($error)) ? [] : $error,
			]);
			exit;
		}

		$args['title'] = 'Settings';
		$args['success'] = $this->session->flashdata('success');
		$this->template->dashboard('settings', $args);
	}
}

/* End of file settings.php */
/* Location: ./application/controllers/settings.php */
