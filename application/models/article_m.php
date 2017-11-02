<?php

/**
 * @filesource article_m.php
 *
 * @author xiaobin
 * @version 1.0
 * <br> date: 2013.10.08 </br>
 * @license Apache License Version 2.0
 *
 * @tutorial articles table.
 */

class Article_M extends MY_Model {
	protected $_table_name = 'articles';
	protected $_order_by = 'pubdate desc, id ';
	protected $_timestamps = TRUE;
	
	public $rules = array (
			'pubdate' => array (
					'field' => 'pubdate',
					'label' => 'Publication date',
					'rules' => 'trim|required|exact_length[10]|xss_clean' 
			),
			'title' => array (
					'field' => 'title',
					'label' => 'Title',
					'rules' => 'trim|required|max_length[100]|xss_clean' 
			),
			'slug' => array (
					'field' => 'slug',
					'label' => 'Slug',
					'rules' => 'trim|required|max_length[100]|xss_clean' 
			),
			'body' => array (
					'field' => 'body',
					'label' => 'Body',
					'rules' => 'trim|required' 
			),
		);
	
	public function __construct() {
		parent::__construct ();
	}
}

?>
