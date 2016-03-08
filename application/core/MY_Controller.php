<?php

class MY_Controller extends CI_Controller {
	public $data = array();
	
	public function __construct() {
		parent::__construct ();
		
		$this->data['errors'] = '';
		
		// zh-cn or en-us or ja-jp		
		$this->data['langs'] = array(
			config_item('lang_zh'),
			config_item('lang_en'),
			config_item('lang_ja')
		);
		
		$this->data['flag_iLang'] = 0;
		
		$langs = $this->data['langs'];
		
		$i = 0;
		foreach ($langs as $lang) {
			if (stristr($_SERVER['SCRIPT_NAME'], $lang)) {
				$this->data['flag_iLang'] = $i;
			}
			$i++;
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