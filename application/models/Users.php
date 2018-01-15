<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model {

	public $table = 'users';

	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function getUser($user) {
		return $this->db->where('username', $user)->or_where('ID', $user)->get($this->table)->row();
	}

}

/* End of file Users.php */
/* Location: ./application/models/Users.php */
