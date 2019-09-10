<?php

class Sector extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
	
		$this->load->model('Sector_M');
	}
	
	public function index() {
		$this->data['sectors'] = $this->Sector_M->get();
		$this->data['subview'] = 'admin/sector/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function edit($id = NULL) {
		$fields = array(
				'name',
				'description'
		);
	
		if ($id) {
			$this->data['sector'] = $this->Sector_M->get($id);
			count($this->data['sector']) || $this->data['error'][] = 'sector could not be found';
		}
		else {
			$this->data['sector'] = $this->Sector_M->set_spaces($fields);
		}
	
		$rules = $this->Sector_M->rules_admin;
	
		$this->form_validation->set_rules($rules);
	
		if ($this->form_validation->run() == TRUE) {
			// Collection form data
			$data_form = $this->Sector_M->array_form_post($fields);
			// Save DB table
			$this->Sector_M->save($data_form, $id);
			redirect($this->data['langName'] . '/' . 'admin/sector', 'refresh');
		}
	
		$this->data['subview'] = 'admin/sector/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function delete($id) {
		$this->sector_M->delete($id);
		redirect($this->data['langName'] . '/' . 'admin/sector', 'refresh');
	}
	
}

?>
