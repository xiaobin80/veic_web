<?php

class Glossary extends Admin_Controller {
	public function __construct() {
		parent::__construct ();
	
		$this->load->model('Glossary_M');
	}
	
	public function index() {
		$this->data['glossaries'] = $this->Glossary_M->get();
		$this->data['subview'] = 'admin/glossary/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function edit($id = NULL) {
		$fields = array(
				'lang_id',
				'sector_id',
				'name',
				'description'
		);
	
		if ($id) {
			$this->data['glossary'] = $this->Glossary_M->get($id);
			count($this->data['glossary']) || $this->data['error'][] = 'glossary could not be found';
		}
		else {
			$this->data['glossary'] = $this->Glossary_M->set_spaces($fields);
		}
	
		$rules = $this->Glossary_M->rules_admin;
	
		$this->form_validation->set_rules($rules);
	
		if ($this->form_validation->run() == TRUE) {
			// Collection form data
			$data_form = $this->Glossary_M->array_form_post($fields);
			// Save DB table
			$this->Glossary_M->save($data_form, $id);
			redirect($this->data['langName'] . '/admin/glossary');
		}
	
		$this->data['subview'] = 'admin/glossary/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
	
	public function delete($id) {
		$this->Glossary_M->delete($id);
		redirect($this->data['langName'] . '/admin/glossary');
	}
	
}

?>
