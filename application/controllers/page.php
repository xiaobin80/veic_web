<?php
/**
 * @filesource page.php
 *
 * @author xiaobin
 * @version 1.0
 * @license Apache License Version 2.0
 *
 * @tutorial Primary Controller
 */
class Page extends Frontend_Controller {
	public function __construct() {
		parent::__construct ();
		
		$this->load->model('Product_M');
		$this->load->model('Statu_M');
		$this->load->model('Image_M');
		$this->load->model('Parameter_M');
		$this->load->model('Contact_M');
		$this->load->model('Qualification_M');
	}
	
	public function index() {
		$homepage = 'homepage';
		
		$this->data['breadData'] = array();
		
		$this->data['subview'] = 'templates/' . $homepage;
		$this->data['sidebar'] = 'components/sidebar';
		$this->load->view('_main_layout', $this->data);
	}
	
	public function search($searchVal) {
		$this->data['isSearch'] = TRUE;
		$this->data['searchVal'] = $searchVal;
		$this->get_article_view(
				'articles', 
				$searchVal, 
				'article_list',
				FALSE);
	}
	
	
	public function invoke($param) {
		if ($param == null)
			redirect('errors/error_404', 'refresh');
		
		$iCount = strpos($param, '-');
		$iLevel = 2;
		
		if ($iCount) $iLevel = 3;
		
		$this->data['breadData'] = $this->get_navInstr(
				$this->get_space($param), 
				$this->data['lang_id'], $iLevel);
		
		$templateName = 'templates/';
		
		if ($iCount) {
			$strPrefix = substr($param, 0, $iCount);
			$strName = substr(strrchr($param, '-'), 1);
			
			switch ($strPrefix) {
				case 'Product': 
					$this->_product_view($strName);

					switch ($this->data['flag_iLang']) {
						case 0:
							$templateName .= 'production_cn';
							break;
						case 1:
							$templateName .= 'production';
							break;
						case 2:
							$templateName .= 'production_ja';
							break;
					}
					
					$this->_loadSubView($templateName);
					
					break;
				case 'Company': 
					$this->_company_view($strName);
					break;
				case 'Contact':
					$this->_contact_view($strName);
					$templateName .= 'contact';
					$this->_loadSubView($templateName);
					
					break;
				case 'About':
					if ($strName === 'profile')
						$this->get_article_view($strName, $strName, $strName, TRUE);
					else {
						$this->_about_view($strName);
						$templateName .= 'qualifications';
						$this->_loadSubView($templateName);
					}
						
					break;
			}
		}
		else {
			//echo $param . ' Found not links';
			$this->_menu_team_view($param);
			$templateName .= 'menuList';
			$this->_loadSubView($templateName);
		}
		
	}
	
	private function _loadSubView($subViewName) {
		$this->data['menu_prefix'] = NULL;
		$this->data['subview'] = $subViewName;
		$this->load->view('_main_layout', $this->data);
	}
	
	private function _menu_team_view($name) {
		$where = array('lang_id' => $this->data['lang_id'], 'linkAddr' => $name);
		
		$termMenuID = $this->Navigation_M->get_by($where, TRUE)->id;
		
		$whereList = array(
				'lang_id' => $this->data['lang_id'], 
				'parent_id' => $termMenuID);
		$this->data['menu_team_list'] = $this->Navigation_M->get_by($whereList, FALSE);
	}
	
	private function _product_view($name) {
		$this->data['productName'] = $name;
		$where = array(
				'lang_id' => $this->data['lang_id'], 
				'name' => $name);
		
		// get status name
		$statu_id = $this->get_foreignKey('Product_M', $where, 'statu_id');
		$this->data['productStatus'] = $this->Statu_M->get($statu_id)->name;
		
		// get image id
		$img_id = $this->get_foreignKey('Product_M', $where, 'img_id');
		// set image name
		$this->data['imgName'] = $this->Image_M->get($img_id)->name;
		// set product description
		$this->data['productDesc'] = $this->Product_M->get_by($where, TRUE)->description;
		// get parameter id
		$param_id = $this->get_foreignKey('Product_M', $where, 'param_id');
		// set Porduct parameter
		$this->data['param_list'] = $this->Parameter_M->get($param_id);
	}
	
	private function _company_view($name) {
		$this->get_article_view(
				'articles', 
				$name, 
				'article_list', 
				TRUE);
	}
	
	private function _contact_view($name) {	
		$spaceName = $this->get_space($name);
		
		$where = array(
				'lang_id' => $this->data['lang_id'], 
				'name' => $spaceName);

		$this->data['contact'] = $this->Contact_M->get_by($where, TRUE);
	}
	
	private function _about_view($name) {
		$iFlag = 2;
		preg_match('/^qual\w+/i', $name, $matches);
		if(count($matches))
		    $iFlag = 0; // Aptitude - flag = 0
		else
		    $iFlag = 1; // Technique - flag = 1
		
		// Qualifications table
		$col = 'qualifications.*, img.name as imgName';
		$where = array(
				'qualifications.lang_id' => $this->data['lang_id'], 
				'qualifications.flag' => strval($iFlag));
		
		$joinCond = 'qualifications.img_id = img.id';
		
		$this->data['certificates'] = 
			$this->Qualification_M->get_join_table(
					$col, 
					'images img', 
					$joinCond, $where);
	}
	
}

?>