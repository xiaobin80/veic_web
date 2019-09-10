<?php

class Product extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
		
		$this->load->model('Statu_M');
		$this->load->model('Parameter_M');
		$this->load->model('Product_M');
	}
	
	public function status($param, $id = NULL) {
		switch ($param) {
			case 'list':
				$this->_statu_index();
				break;
			case 'add':
				$this->_statu_edit(NULL);
				break;
			case 'edit':
				$this->_statu_edit($id);
				break;
			case 'delete':
				$this->_statu_delete($id);
				break;
			default:
				$this->_statu_index();
				break;
		}
	}
	
	private function _statu_index() {
		$this->data['status'] = $this->Statu_M->get();
		
		$this->data['subview'] = 'admin/product/statu_index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	private function _statu_edit($id = NULL) {
		$fields = array(
				'pubdate',
				'name'
		);
		
		if ($id) {
			$this->data['statu'] = $this->Statu_M->get($id);
			count($this->data['statu']) || $this->data['error'][] = 'statu could not be found';
		}
		else {
			$this->data['statu'] = $this->Statu_M->set_spaces($fields);
		}
		
		// Set form
		$rules = $this->Statu_M->rules_admin;
		
		$this->form_validation->set_rules($rules);
		
		if ($this->form_validation->run() == TRUE) {
			// Collection form data
			$data_form = $this->Statu_M->array_form_post($fields);
			// Save DB table
			$this->Statu_M->save($data_form, $id);
			redirect($this->data['langName'] . '/' . 'admin/product/status/list', 'refresh');
		}
		
		$this->data['subview'] = 'admin/product/statu_edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	private function _statu_delete($id) {
		$this->Statu_M->delete($id);
		redirect($this->data['langName'] . '/' . 'admin/product/status/list', 'refresh');
	}
	
	public function parameters($param, $id = NULL) {
		switch ($param) {
			case 'list':
				$this->_parameter_index();
				break;
			case 'add':
				$this->_parameter_edit(NULL);
				break;
			case 'edit':
				$this->_parameter_edit($id);
				break;
			case 'delete':
				$this->_parameter_delete($id);
				break;
			default:
				$this->_sparameter_index();
				break;
		}
	}
	
	private function _parameter_index() {
		$this->data['parameters'] = $this->Parameter_M->get();
		
		$this->data['subview'] = 'admin/product/param_index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	private function _parameter_edit($id = NULL) {
		$fields = array(
				'lang_id',
				'name',
				'mtbf',
				'voltage',
				'electricity',
				'ipxx',
				'temperature'
		);
		
		if ($id) {
			$this->data['parameter'] = $this->Parameter_M->get($id);
			count($this->data['parameter']) || $this->data['error'][] = 'parameter could not be found';
		}
		else {
			$this->data['parameter'] = $this->Parameter_M->set_spaces($fields);
		}
		
		// Set form
		$rules = $this->Parameter_M->rules_admin;
		
		$this->form_validation->set_rules($rules);
		
		if ($this->form_validation->run() == TRUE) {
			// Collection form data
			$data_form = $this->Parameter_M->array_form_post($fields);
			// Save DB table
			$this->Parameter_M->save($data_form, $id);
			redirect($this->data['langName'] . '/' . 'admin/product/parameters/list', 'refresh');
		}
		
		$this->data['subview'] = 'admin/product/param_edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	private function _parameter_delete($id) {
		$this->Parameter_M->delete($id);
		redirect($this->data['langName'] . '/' . 'admin/product/parameters/list', 'refresh');
	}
	
	public function index() {
		$this->data['products'] = $this->Product_M->get_by($this->data['lang_cond']);
		
		$this->data['subview'] = 'admin/product/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function edit($id = NULL) {
		$fields = array(
				'lang_id',
				'param_id',
				'statu_id',
				'img_id',
				'name',
				'description'
		);
		
		if ($id) {
			$this->data['product'] = $this->Product_M->get($id);
			count($this->data['product']) || $this->data['error'][] = 'product could not be found';
		}
		else {
			$this->data['product'] = $this->Product_M->set_spaces($fields);
		}
		
		$this->data['param_list'] = $this->_get_param_list();
		$this->data['statu_list'] = $this->_get_statu_list();
		
		// Set form
		$rules = $this->Product_M->rules_admin;
		
		$this->form_validation->set_rules($rules);
		
		if ($this->form_validation->run() == TRUE) {
			// Collection form data
			$data_form = $this->Product_M->array_form_post($fields);
			// Save DB table
			$this->Product_M->save($data_form, $id);
			redirect($this->data['langName'] . '/' . 'admin/product', 'refresh');
		}
		
		$this->data['subview'] = 'admin/product/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function delete($id) {
		$this->Product_M->delete($id);
		redirect($this->data['langName'] . '/' . 'admin/product', 'refresh');
	}
	
	private function _get_param_list() {
		$array = $this->Parameter_M->get();
		$result = array();
		foreach ($array as $row) {
			$result[$row->id] = $row->name;
		}
		return $result;
	}
	
	private function _get_statu_list() {
		$array = $this->Statu_M->get();
		$result = array();
		foreach ($array as $row) {
			$result[$row->id] = $row->name;
		}
		return $result;
	}
}

?>