<?php

/**
 * @filesource contact_m.php
 *
 * @author xiaobin
 * @version 1.0
 * <br> date: 2013.10.08 </br>
 * @license Apache License Version 2.0
 *
 * @tutorial contacts table.
 */

class Contact_M extends MY_Model {
	protected $_table_name = 'contacts';
	protected $_order_by = 'id';
	
	public $rules_admin = array(
			'name'  => array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'trim|required|xss_clean'
			),
			'tel'  => array(
					'field' => 'tel',
					'label' => 'Tel',
					'rules' => 'trim|required|xss_clean'
			),
			'fax' => array(
					'field' => 'fax',
					'label' => 'Fax',
					'rules' => 'trim|required|xss_clean'
			),
			'email' => array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'trim|required|valid_email|xss_clean'
			),
	);
	
	public function __construct() {
		parent::__construct ();
	}
}

?>