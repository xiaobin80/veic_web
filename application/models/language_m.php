<?php

/**
 * @filesource language_m.php
 *
 * @author xiaobin
 * @version 1.0
 * <br> date: 2013.10.08 </br>
 * @license Apache License Version 2.0
 *
 * @tutorial languages table.
 */
class Language_M extends MY_Model {
	protected $_table_name = 'languages';
	protected $_order_by = 'id';
	
	public $rules_admin = array(
			'code'  => array(
					'field' => 'code',
					'label' => 'Code',
					'rules' => 'trim|required|xss_clean'
			),
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
}

?>