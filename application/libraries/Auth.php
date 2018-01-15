<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {
	public $ci;
	public function __construct() {
		$this->ci =& get_instance();
	}
	
	public function save($name, $value = '') {
		if (is_array($name) OR is_object($name)) {
			foreach ($name as $k => $v) {
				$this->save($k, $v);
			}
			
			return true;
		}
		
		$this->ci->session->set_userdata($name, $value);
		
		return true;
	}
	
	public function isLogin() {
		return $this->ci->session->has_userdata('username') && $this->ci->session->has_userdata('password') && $this->ci->session->has_userdata('email');
	}
	
	public function redIfLogin() {
		if ($this->isLogin()) {
			redirect('dashboard');
		}
	}
	
	public function redIfNotLogin() {
		if ( ! $this->isLogin()) {
			redirect('dashboard/login');
		}
	}
	
	public function logout() {
		$this->ci->session->sess_destroy();
	}
}
