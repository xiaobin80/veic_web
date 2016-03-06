<?php

class MY_Controller extends CI_Controller {
	public $data = array();
	
	public function __construct() {
		parent::__construct ();
		
		$this->data['errors'] = '';
		
		// zh-cn or en-us or ja-jp
		$this->data['lang_zh'] = config_item('lang_zh');
		$this->data['lang_en'] = config_item('lang_en');
		$this->data['lang_ja'] = config_item('lang_ja');
		
		$this->data['flag_zh'] = FALSE;
		$this->data['flag_ja'] = FALSE;
		if (stristr($_SERVER['SCRIPT_NAME'], $this->data['lang_zh'])) {
			$this->data['flag_zh'] = TRUE;
		}
		
		if (stristr($_SERVER['SCRIPT_NAME'], $this->data['lang_ja'])) {
			$this->data['flag_ja'] = TRUE;
		}
	}
	
	/**
	 * <p> Get the languages table ID </p>
	 *
	 * @param string $langName
	 * @return string Languages's ID
	 */
	protected function _get_langID($langName) {
		$sqlCond = 'name = "' . $langName . '"';
		return $this->Language_M->get_by($sqlCond, TRUE)->id;
	}
}

?>