<?php

class Contact extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
		
		$this->load->model('Contact_M');
	}
	
	public function index() {
		$this->data['contacts'] = $this->Contact_M->get_by($this->data['lang_cond']);
		$this->data['subview'] = 'admin/contact/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function edit($id = NULL) {
		$fields = array(
				'lang_id',
				'name',
				'displayName',
				'tel',
				'fax',
				'email'
		);
		
		if ($id) {
			$this->data['contact'] = $this->Contact_M->get($id);
			count($this->data['contact']) || $this->data['error'][] = 'contact could not be found';
		}
		else {
			$this->data['contact'] = $this->Contact_M->set_spaces($fields);
		}
		
		$rules = $this->Contact_M->rules_admin;
		
		$this->form_validation->set_rules($rules);
		
		if ($this->form_validation->run() == TRUE) {
			// Collection form data
			$data_form = $this->Contact_M->array_form_post($fields);
			// Save DB table
			$this->Contact_M->save($data_form, $id);
			redirect('admin/contact');
		}
		
		$this->data['subview'] = 'admin/contact/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function delete($id) {
		$this->Contact_M->delete($id);
		redirect('admin/contact');
	}
}

?>