<?php

class Image extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
	
		$this->load->model('Image_M');
	}
	
	public function index() {
		$this->data['images'] = $this->Image_M->get();
		$this->data['subview'] = 'admin/image/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function edit($id = NULL) {
		$fields = array(
				'name',
				'description'
		);
	
		if ($id) {
			$this->data['image'] = $this->Image_M->get($id);
			count($this->data['image']) || $this->data['error'][] = 'image could not be found';
		}
		else {
			$this->data['image'] = $this->Image_M->set_spaces($fields);
		}
	
		$rules = $this->Image_M->rules_admin;
	
		$this->form_validation->set_rules($rules);
	
		if ($this->form_validation->run() == TRUE) {
			// Collection form data
			$data_form = $this->Image_M->array_form_post($fields);
			// Save DB table
			$this->Image_M->save($data_form, $id);
			redirect($this->data['langName'] . '/admin/image');
		}
	
		$this->data['subview'] = 'admin/image/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function delete($id) {
		$this->Image_M->delete($id);
		redirect($this->data['langName'] . '/admin/image');
	}
	
}

?>
