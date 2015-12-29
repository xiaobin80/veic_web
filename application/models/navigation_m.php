<?php

/**
 * @filesource navigation_m.php
 *
 * @author xiaobin
 * @version 1.0
 * <br> date: 2013.10.08 </br>
 * @license Apache License Version 2.0
 *
 * @tutorial navigations table.
 */

class Navigation_M extends MY_Model {
	protected $_table_name = 'navigations';
	protected $_order_by = 'order1';
	
	public $rules_admin = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|xss_clean'
			
		),
		'template' => array(
			'field' => 'template',
			'label' => 'Template',
			'rules' => 'trim|required|xss_clean'
		),
	);
	
	public function __construct() {
		parent::__construct ();
	}
	
	/**
	 * <p> Get the menu data </p>
	 * 
	 * @param string $lang_id
	 * @return array
	 */
	public function get_nested($lang_id = NULL) {
		if ($lang_id != NULL)
			$this->db->where('lang_id', $lang_id);
		
		$this->db->order_by($this->_order_by);
		$navs = $this->db->get($this->_table_name)->result_array();
		
		$array = array();
		
		foreach ($navs as $nav) {
			if ($nav['parent_id'] == 0) {
				$array[$nav['id']] = $nav;
			}
			else {
				$array[$nav['parent_id']]['children'][] = $nav;
			}
		}
		return $array;
	}
	
	public function save_order($array) {
		if (count($array)) {
			foreach ($array as $order => $item) {
				if ($item['item_id'] != '') {
					$data = array(
						'parent_id' => (int) $item['parent_id'],
						'order1' => $order
					);
					
					$this->db->set($data)->where($this->_primary_key, 
							$item['item_id'])->update($this->_table_name);
				}
			}
		}
	}
	
}

?>