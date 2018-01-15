<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Options extends CI_Model {
	
	private $load = [];

	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Get settings from database
	 * @param  string $key
	 * @return string
	 */
	public function get($key) {
		if (isset($this->load[$key])) {
			return $this->load[$key];
		}
		
		return $this->load[$key] = $this->db->select('s_val')->where('s_key', $key)->get('settings')->row()->s_val;
	}
	
	public function update($key, $val = '')
	{
		if (is_array($key)) {
			foreach ($key as $k => $v) {
				$this->update($k, $v);
			}
			
			return true;
		}
		
		return $this->db->where('s_key', $key)->set('s_val', $val)->update('settings');
	}
	
	/**
	 * Magic Function to get info
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	public function __get($key) {
		return get_instance()->$key;
	}

}

/* End of file options.php */
/* Location: ./application/models/options.php */
