<?php

class Qualification extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
		
		$this->load->model('Qualification_M');
	}
	
	public function index() {
		$this->data['qualifications'] = $this->Qualification_M->get_by($this->data['lang_cond']);
		
		$this->data['subview'] = 'admin/qualification/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function edit($id = NULL) {
		$this->data['mceFlag'] = TRUE;
		
		$fields = array(
				'lang_id',
				'img_id',
				'flag',
				'name',
				'description'
		);
		
		if ($id) {
			$this->data['qualification'] = $this->Qualification_M->get($id);
			count($this->data['qualification']) || $this->data['error'][] = 'qualification could not be found';
		}
		else {
			$this->data['qualification'] = $this->Qualification_M->set_spaces($fields);
		}
		
		// Set form
		$rules = $this->Qualification_M->rules_admin;
		
		$this->form_validation->set_rules($rules);
		
		if ($this->form_validation->run() == TRUE) {
			// Collection form data
			$data_form = $this->Qualification_M->array_form_post($fields);
			// Save DB table
			$this->Qualification_M->save($data_form, $id);
			redirect($this->data['langName'] . '/' . 'admin/qualification', 'refresh');
		}
		
		$this->data['subview'] = 'admin/qualification/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function delete($id) {
		$this->Qualification_M->delete($id);
		
		redirect($this->data['langName'] . '/' . 'admin/qualification', 'refresh');
	}
	
}

?>