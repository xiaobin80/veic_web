<?php
/**
 * @filesource article.php
 *
 * @author xiaobin
 * @version 1.0
 * @license Apache License Version 2.0
 *
 * @tutorial article details.
 */


class Article extends Frontend_Controller {
	public function __construct() {
		parent::__construct ();
	}
	
	public function view($id = NULL) {
		if ($id) {
			$this->data['article'] = $this->Article_M->get($id);
			
			$linkAddr = $this->get_nav_addr($id);
			$navInstr = $this->get_navInstr($linkAddr, $this->data['lang_id']);
			
			$this->data['breadData'] = $navInstr;
			
			//count($this->data['article']) || $this->data['error'][] = 'article could not be found';
			$objCount = $this->data['article'];
			(is_array($objCount) && $objCount instanceof Countable) || $this->data['error'][] = 'article could not be found';
		}
		else {
			redirect('errors/error_404');
		}
		
		$this->data['menu_prefix'] = $this->data['menu_href'] . 'page/invoke/';
		$this->data['subview'] = 'templates/article';
		$this->load->view('_main_layout', $this->data);
	}
}

?>