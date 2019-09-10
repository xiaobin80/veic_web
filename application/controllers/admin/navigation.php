<?php

class Navigation extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
		
		$this->load->model('Navigation_M');
	}
	
	public function index() {
		$this->data['navigations'] = $this->Navigation_M->get();
		
		$this->data['subview'] = 'admin/navigation/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function edit($id = NULL) {
		$fields = array(
				'name',
				'template',
				'lang_id',
				'linkAddr'
		);
		
		if ($id) {
			$this->data['navigation'] = $this->Navigation_M->get($id);
			count($this->data['navigation']) || $this->data['error'][] = 'navigation could not be found';
		}
		else {	
			$this->data['navigation'] = $this->Navigation_M->set_spaces($fields);
		}
		
		$rules = $this->Navigation_M->rules_admin;
		
		$this->form_validation->set_rules($rules);
		
		if ($this->form_validation->run() == TRUE) {
			// Collection form data
			$data_form = $this->Navigation_M->array_form_post($fields);
			// Save DB table
			$this->Navigation_M->save($data_form, $id);
			redirect($this->data['langName'] . '/' . 'admin/navigation', 'refresh');
		}
		
		$this->data['subview'] = 'admin/navigation/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function delete($id) {
		$this->Navigation_M->delete($id);
		redirect($this->data['langName'] . '/' . 'admin/navigation', 'refresh');
	}
	
	public function order() {
		// ON sortable
		$this->data['sortable'] = TRUE;
		
		$this->data['subview'] = 'admin/navigation/order';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function order_ajax() {
		// Save order from ajax call
		if (isset($_POST['sortable'])) {
			$this->Navigation_M->save_order($_POST['sortable']);
		}
		
		$this->data['navigations'] = $this->Navigation_M->get_nested();
		
		$this->load->view('admin/navigation/order_ajax', $this->data);
	}
	
}

?>