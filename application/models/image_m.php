<?php

/**
 * @filesource image_m.php
 *
 * @author xiaobin
 * @version 1.0
 * <br> date: 2013.12.21 </br>
 * @license Apache License Version 2.0
 *
 * @tutorial images table.
 */
class Image_M extends MY_Model {
	protected $_table_name = 'images';
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
