<?php

/**
 * @filesource product_m.php
 *
 * @author xiaobin
 * @version 1.0
 * <br> date: 2013.10.08 </br>
 * @license Apache License Version 2.0
 *
 * @tutorial products table.
 */

class Product_M extends MY_Model {
	protected $_table_name = 'products';
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