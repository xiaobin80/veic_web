<?php

/**
 * @filesource parameter_m.php
 *
 * @author xiaobin
 * @version 1.0
 * <br> date: 2013.10.08 </br>
 * @license Apache License Version 2.0
 *
 * @tutorial parameters table.
 */

class Parameter_M extends MY_Model {
	protected $_table_name = 'parameters';
	protected $_order_by = 'id';
	
	public $rules_admin = array(
			'mtbf'  => array(
					'field' => 'mtbf',
					'label' => 'Mtbf',
					'rules' => 'trim|required|xss_clean'
			),
			'voltage' => array(
					'field' => 'voltage',
					'label' => 'Voltage',
					'rules' => 'trim|required|xss_clean'
			),
	);
	
	public function __construct() {
		parent::__construct ();
	}
}

?>