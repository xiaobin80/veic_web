<?php

/**
 * @filesource statu_m.php
 *
 * @author xiaobin
 * @version 1.0
 * <br> date: 2013.10.08 </br>
 * @license Apache License Version 2.0
 *
 * @tutorial status table.
 */

class Statu_M extends MY_Model {
	protected $_table_name = 'status';
	protected $_order_by = 'id';
	
	public $rules_admin = array(
			'name'  => array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'trim|required|xss_clean'
			),
			'pubdate' => array(
					'field' => 'pubdate',
					'label' => 'Pubdate',
					'rules' => 'trim|required|xss_clean'
			),
	);
	
	public function __construct() {
		parent::__construct ();
	}
}

?>