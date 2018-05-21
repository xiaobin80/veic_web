<?php

class User extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
	}
	
	public function index() {
		$this->data['users'] = $this->User_M->get_by('flag = 0');
		$this->data['subview'] = 'admin/user/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function login() {
		$dashboard = $this->data['langName'] . '/admin/dashboard';
		
		$this->User_M->loggedin() == FALSE || redirect($dashboard);
		
		$rules = $this->User_M->rules;
		$this->form_validation->set_rules($rules);
		
		if ($this->form_validation->run() == TRUE) {
			// 
			if ($this->User_M->login() == TRUE) {
				redirect($dashboard);
			}
			else {
				$this->session->set_flashdata('error', 'The email/password combination does not exist');
				redirect($this->data['langName'] . '/admin/user/login', 'refresh');
			}
		}
		
		$this->data['subview'] = 'admin/user/login';
		$this->load->view('admin/_layout_modal', $this->data);
	}
	
	public function logout() {
		$this->User_M->logout();
		
		redirect($this->data['langName'] . '/admin/user/login');
	}
	
	public function _unique_mail($str) {
		$id = $this->uri->segment(4);
		$this->db->where('email', $this->input->post('email'));
		!$id || $this->db->where('id != ', $id);
		$user = $this->User_M->get();
		
		if (count($user)) {
			$this->form_validation->set_message('_unique_email', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}
	
	public function edit($id = NULL) {
		$user_new = FALSE;
		
		$fields = array(
				'email',
				'name',
				'password'
		);
		
		if ($id) {
			$this->data['user'] = $this->User_M->get($id);
			count($this->data['user']) || $this->data['error'][] = 'User could not be found';
		}
		else {
			$this->data['user'] = $this->User_M->set_spaces($fields);
			$user_new = TRUE;
		}
		
		// Set form
		$rules = $this->User_M->rules_admin;
		$id || $rules['password']['rules'] .= '|required';
		$this->form_validation->set_rules($rules);
		
		if ($this->form_validation->run() == TRUE) {
			// Collection form data
			$data_form = $this->User_M->array_form_post($fields);
			// Encryption key
			$data_form['password'] = $this->User_M->hash($data_form['password']);
			// Add data time
			if ($user_new) $data_form['created'] = date('Y-m-d H:i:s');
			// Save DB table
			$this->User_M->save($data_form, $id); 
			redirect($this->data['langName'] . 'admin/user');
		}
		
		$this->data['subview'] = 'admin/user/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function delete($id) {
		$this->User_M->delete($id);
		redirect($this->data['langName'] . 'admin/user');
	}
	
}

?>