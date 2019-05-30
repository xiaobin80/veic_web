<?php

class PressCenter extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
		
		$this->load->model('Type_M');
		$this->load->model('Article_M');
	}
	
	public function types($param, $id = NULL) {

		switch ($param) {
			case 'list':
				$this->_type_index();
				break;
			case 'add':
				$this->_type_edit(NULL);
				break;
			case 'edit':
				$this->_type_edit($id);
				break;
			case 'delete':
				$this->_type_delete($id);
				break;
			default:
				$this->_type_index();
				break;
		}
		
	}
	
	
	private function _type_index() {
		$this->data['types'] = $this->Type_M->get();
		
		$this->data['subview'] = 'admin/presscenter/type_index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	private function _type_edit($id = NULL) {
		$fields = array(
				'name',
				'description'
		);
		
		if ($id) {
			$this->data['type'] = $this->Type_M->get($id);
			count($this->data['type']) || $this->data['error'][] = 'type could not be found';
		}
		else {
			$this->data['type'] = $this->Type_M->set_spaces($fields);
		}
		
		// Set form
		$rules = $this->Type_M->rules_admin;
		
		$this->form_validation->set_rules($rules);
		
		if ($this->form_validation->run() == TRUE) {
			// Collection form data
			$data_form = $this->Type_M->array_form_post($fields);
			// Save DB table
			$this->Type_M->save($data_form, $id);
			redirect($this->data['langName'] . '/admin/presscenter/types/list');
		}
		
		$this->data['subview'] = 'admin/presscenter/type_edit';
		$this->load->view('admin/_layout_main', $this->data);
		
	}
	
	private function _type_delete($id) {
		$this->Type_M->delete($id);
		redirect($this->data['langName'] . '/admin/presscenter/types/list');
	}
	
	public function index() {
		$this->data['articles'] = $this->Article_M->get_by($this->data['lang_cond']);
		
		$this->data['subview'] = 'admin/presscenter/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function edit($id = NULL) {
		$fields = array(
				'type_id',
				'lang_id',
				'title',
				'slug',
				'body',
				'pubdate',
				'created',
				'modified'
		);
		
		$this->data['mceFlag'] = TRUE;
		if ($id) {
			$this->data['article'] = $this->Article_M->get($id);
			count($this->data['article']) || $this->data['error'][] = 'article could not be found';
		}
		else {
			$this->data['article'] = $this->Article_M->set_spaces($fields);
		}
		
		// Set form
		$rules = $this->Article_M->rules;
		
		$this->form_validation->set_rules($rules);
		
		if ($this->form_validation->run() == TRUE) {
			// Collection form data
			$data_form = $this->Article_M->array_form_post($fields);
			// Save DB table
			$this->Article_M->save($data_form, $id);
			redirect($this->data['langName'] . '/admin/presscenter');
		}
		
		$this->data['subview'] = 'admin/presscenter/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function delete($id) {
		$this->Article_M->delete($id);
		redirect($this->data['langName'] . '/admin/presscenter');
	}
}

?>