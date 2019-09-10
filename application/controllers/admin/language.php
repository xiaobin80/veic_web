<?php

class Language extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
		
		$this->load->model('Language_M');
	}
	
	public function index() {
		$this->data['languages'] = $this->Language_M->get();
		$this->data['subview'] = 'admin/language/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function edit($id = NULL) {
		$fields = array(
				'code',
				'name',
				'description'
		);
		
		if ($id) {
			$this->data['language'] = $this->Language_M->get($id);
			count($this->data['language']) || $this->data['error'][] = 'language could not be found';
		}
		else {
			$this->data['language'] = $this->Language_M->set_spaces($fields);
		}
		
		// Set form
		$rules = $this->Language_M->rules_admin;
		
		$this->form_validation->set_rules($rules);
		
		if ($this->form_validation->run() == TRUE) {
			// Collection form data
			$data_form = $this->Language_M->array_form_post($fields);
			// Save DB table
			$this->Language_M->save($data_form, $id);
			redirect($this->data['langName'] . '/' . 'admin/language', 'refresh'));
		}
		
		$this->data['subview'] = 'admin/language/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function delete($id) {
		$this->Language_M->delete($id);
		redirect($this->data['langName'] . '/' . 'admin/language', 'refresh'));
	}
}

?>