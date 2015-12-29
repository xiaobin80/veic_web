<?php
/**
 * @filesource user_m.php
 *
 * @author xiaobin
 * @version 1.0
 * <br> date: 2013.10.08 </br>
 * @license Apache License Version 2.0
 *
 * @tutorial users table.
 */

class User_M extends MY_Model {
	/* The variables of the base class */
	protected $_table_name = 'users';
	protected $_order_by = 'name';
	
	public $rules = array(
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email|xss_clean'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		)
	);
	
	public $rules_admin = array(
			'name'  => array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'trim|required|xss_clean'
			),
			'email' => array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'trim|required|valid_email|callback__unique_mail|xss_clean'
			),
			'password' => array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'trim|required|matches[password_confirm]'
			),
			'password_confirm' => array(
					'field' => 'password_confirm',
					'label' => 'Confirm password',
					'rules' => 'trim|required|matches[password]'
			),
	);
	
	public function __construct() {
		parent::__construct ();
	}
	
	public function login() {
		$user_form = array(
			'email' => $this->input->post('email'),
			'password' => $this->hash($this->input->post('password')), // encryption
		);
		
		$user = $this->get_by($user_form, True);
		
		if (count($user)) {
			$data = array(
				'email' => $user->email,
				'name' => $user->name,
				'id' => $user->id,
				'loggedin' => TRUE,
			);
		}
		$this->session->set_userdata($data);
	}
	
	public function logout() {
		$this->session->sess_destroy();
	}
	
	public function loggedin() {
		return (bool) $this->session->userdata('loggedin');
	}
	
	public function hash($string) {
		return hash('sha512', $string . config_item('encryption_key'));
	}
}

?>