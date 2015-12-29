<?php

/**
 * @filesource glossary_m.php
 *
 * @author xiaobin
 * @version 1.0
 * <br> date: 2014.01.13 </br>
 * @license Apache License Version 2.0
 *
 * @tutorial glossaries table.
 */
class Glossary_M extends MY_Model {
	protected $_table_name = 'glossaries';
	protected $_order_by = 'id';
	
	public $rules_admin = array(
			'name'  => array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'trim|required|xss_clean'
			),
			'description' => array(
					'field' => 'description',
					'label' => 'Description',
					'rules' => 'trim|required|xss_clean'
			),
	);
	
	public function __construct() {
		parent::__construct ();
	}
	
	/**
	 * <p> Get English corresponding local language </p>
	 * 
	 * @param string $enName
	 * @param integer $langID
	 * @return string
	 */
	public function get_word($enName, $langID) {
		$where = array('name' => $enName, 'lang_id' => $langID);
		$row = $this->Glossary_M->get_by($where, TRUE);
		//echo '<pre>' . $this->db->last_query() . '</pre>';
		return $row->description;
	}
}

?>