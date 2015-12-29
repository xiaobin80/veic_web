<?php

/**
 * @filesource sector_m.php
 *
 * @author xiaobin
 * @version 1.0
 * <br> date: 2014.01.13 </br>
 * @license Apache License Version 2.0
 *
 * @tutorial sectors table.
 */
class Sector_M extends MY_Model {
	protected $_table_name = 'sectors';
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
}

?>