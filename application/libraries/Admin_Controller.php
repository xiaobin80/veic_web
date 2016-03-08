<?php

class Admin_Controller extends MY_Controller {
	public function __construct() {
		parent::__construct ();
		
		$this->load->library('session');
		$this->load->library('form_validation');
		
		// Load model
		$this->load->model('User_M');
		$this->load->model('Language_M');
		$this->load->model('Image_M');
		$this->load->model('Type_M');
		$this->load->model('Sector_M');
		
		// Language ID
		$langName = $this->data['langs'][$this->data['flag_iLang']];
		
		$langID = $this->_get_langID($langName);
		$this->data['lang_cond'] = array('lang_id' => $langID);
		
		// DropDownList Language
		$langs = array();
		$langIdKeys = array();
		$langDesVals = array();
		
		foreach ($this->data['langs'] as $lang) {
			$name = $this->Language_M->get_by('name = "' . $lang . '"', TRUE);
			array_push($langs, $name);
		}
		
		foreach ($langs as $langInfo) {
			array_push($langIdKeys, $langInfo->id);
			array_push($langDesVals, $langInfo->description);
		}
		
		$this->data['lang_list'] = array_combine($langIdKeys, $langDesVals);
		
		$this->data['img_list'] = $this->_get_dropDown_list('Image_M', 'id', 'name');
		
		$this->data['type_list'] = $this->_get_dropDown_list('Type_M', 'id', 'description');
		
		$this->data['sector_list'] = $this->_get_dropDown_list('Sector_M', 'id', 'name');
		
		$this->data['meta_title'] = 'Admin Edit';
		// Login check
		$exception_uris = array(
				'admin/user/login', 
				'admin/user/logout');
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->User_M->loggedin() == FALSE) {
				redirect('admin/user/login');
			}
		}
		
	}
	
	/**
	 * <p> Get key-value pairs from a data table, </p>
	 * <p> and add it to the array. </p>
	 * 
	 * @param string $model
	 * @param string $key
	 * @param string $value
	 * @return array
	 */
	private function _get_dropDown_list($model, $key, $value) {
		$array = $this->$model->get();
		$result = array();
		foreach ($array as $row) {
			$result[$row->$key] = $row->$value;
		}
		return $result;
	}
}

?>