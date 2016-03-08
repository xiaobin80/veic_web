<?php

class Frontend_Controller extends MY_Controller {
	public function __construct() {
		parent::__construct ();
		
		// Load stuff
		$this->load->model('Navigation_M');
		$this->load->model('Language_M');
		$this->load->model('Article_M');
		$this->load->model('Type_M');
		$this->load->model('Glossary_M');
		
		// Language ID
		$langName = $this->data['langs'][$this->data['flag_iLang']];		
		$this->data['lang_id'] = $this->_get_langID($langName);
		
		// Meta title
		$companyName = $this->Glossary_M->get_word('VEIC', $this->data['lang_id']);
		$webSite = $this->Glossary_M->get_word('web site', $this->data['lang_id']);
		$this->data['meta_title'] = $companyName . ' - ' . $webSite;
		
		// Fetch navigation
		$this->data['menu'] = $this->Navigation_M->get_nested($this->data['lang_id']);
		$this->data['menu_prefix'] = 'page/invoke/';
		$this->data['menu_href'] = stristr($_SERVER['SCRIPT_NAME'], 'index.php', TRUE);
		
		// Breadcrumbs
		$this->data['body'] = $this->Glossary_M->get_word('body', $this->data['lang_id']);
		$this->data['home'] = $this->Glossary_M->get_word('home', $this->data['lang_id']);
		$this->data['isSearch'] = FALSE;
	}
	
	/**
	 * <p> Generate unordered lists, 'class="pagination"' </p>
	 * <p> http://getbootstrap.com/components/#pagination </p>
	 * 
	 * @param integer $counts
	 * @param integer $perpage
	 * @return string
	 */
	private function _get_pagination($counts, $perpage) {
		$result = '';

		$strUrl = $this->uri->rsegment(1) . '/' . $this->uri->rsegment(2) . '/' . $this->uri->rsegment(3) . '/';
			
		$config['base_url'] = site_url($strUrl);
		$config['total_rows'] = $counts;
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 4;
			
		$this->pagination->initialize($config);
		$result = $this->pagination->create_links();
		
		return $result;
	}
	
	/**
	 * <p> Gets the specified data table's foreign key values </p>
	 *
	 * @param string $model
	 * @param array $where
	 * @param string $foreignKey
	 * @return string
	 */
	protected function get_foreignKey($model, $where, $foreignKey) {
		return $this->$model->get_by($where, TRUE)->$foreignKey;
	}
	
	/**
	 * <p> Convert special characters to spaces </p>
	 *
	 * @param string $string
	 * @return string
	 */
	protected function get_space($string) {
		if (strpos($string, '%20'))
			$result = strtr($string, array('%20' => ' '));
		else
			$result = $string;
	
		return $result;
	}
	
	/**
	 * <p> First, determine whether the article type; </p>
	 * <p> Then, to find articles based on article type and language ID; </p>
	 * <p> Otherwise, under the "search words" and language ID to locate the article. </p>
	 * <p> Finally, you call the "_article_list_view" shows a list of articles. </p>
	 * <p> return to the $this->data[$result] </p>
	 * 
	 * @param string $templateName
	 * @param string $typeName
	 * @param array $result
	 * @param boolean $isType
	 */
	protected function get_article_view($templateName, $typeName, $result, $isType = TRUE) {
		$templatePath = 'templates/' . $templateName;
	
		if ($isType) {
			$typeID = $this->Type_M->get_by(array('name' => $typeName), TRUE)->id;
			$where = array('lang_id' => $this->data['lang_id'], 'type_id' => $typeID);
		}
		else {
			$name = urldecode($typeName);
			$where = '`lang_id` = ' . $this->data['lang_id'] . 
					' AND ' . ' `body` LIKE "%' . $name . '%"';
		}
		
		$this->_article_list_view($templatePath, $where, $result);
	}
	
	/**
	 * <p> Find articles and page displays based on conditions. </p>
	 * 
	 * @param string $templatePath
	 * @param array or string $where
	 * @param array $result
	 */
	private function _article_list_view($templatePath, $where, $result) {
		// pagination begin
		$counts = $this->Article_M->get_count($where);
		
		$perpage = 13;
		if ($counts > $perpage) {
			// load library(system - libraries - pagination.php)
			$this->load->library('pagination');
				
			$offset = $this->uri->segment(4);
				
			$this->data['pagination'] = $this->_get_pagination($counts, $perpage);
		}
		else {
			$this->data['pagination'] = '';
			$offset = 0;
		}
		
		$this->db->limit($perpage, $offset);
		// pagination end
		
		$this->data[$result] = $this->Article_M->get_by($where, FALSE);
		
		$this->data['menu_prefix'] = $this->data['menu_href'] . 'page/invoke/';
		$this->data['subview'] = $templatePath;
		$this->load->view('_main_layout', $this->data);
		
		$this->data['body'] = $this->Glossary_M->get_word('body', $this->data['lang_id']);
	}
	
	/**
	 * <p> Navigation instructions </p>
	 * <p> For example: News > Company news </P>
	 *
	 * @param string $linkAddr
	 * @return string
	 */
	protected function get_navInstr($linkAddr, $langID) {
		$result = array();
		$homeWord = $this->Glossary_M->get_word('home', $langID);
		
		$srvLink = $_SERVER['HTTP_HOST'] . $this->data['menu_href'];
		$home = array(
				'name'=>$homeWord, 
				'linkAddr' => $srvLink, 
				'homeFlag' => TRUE);
		
		$where = array('linkAddr' => $linkAddr, 'lang_id' => $langID);
		$curNavRow = $this->Navigation_M->get_by($where, TRUE);
		$suffixName = $curNavRow->name;
		
		$parentID = $curNavRow->parent_id;
		$whereParent = 'id = ' . $parentID;
		$parentNavRow = $this->Navigation_M->get_by($whereParent, TRUE);
		$prefixName = $parentNavRow->name;
		
		$prefixArray = array('name' => $prefixName, 
				'linkAddr' => $parentNavRow->linkAddr, 
				'homeFlag' => FALSE);
		
		$suffixArray = array(
				'name' => $suffixName, 
				'linkAddr' => $linkAddr, 
				'homeFlag' => FALSE);
		
		$result[0] = $home;
		$result[1] = $prefixArray;
		$result[2] = $suffixArray;
		
		return $result;
	}
	
	protected function get_nav_addr($id) {
		$row = $this->Article_M->get($id);
		$typeID = $row->type_id;
		$langID = $row->lang_id;
		$link_suffix = $this->Type_M->get($typeID);
		$link_name = $link_suffix->name;
		$percent = '%';
		$sqlCond = "SELECT `linkAddr` " . " FROM " . " (`navigations`) ";
		$sqlCond .= " WHERE " . " `lang_id` = " . $langID;
		$sqlCond .= " AND " . " `linkAddr` " . " LIKE '" . $percent . $link_name . "'";
	
		$linkAddr = $this->Navigation_M->get_like($sqlCond, 'linkAddr');
		return $linkAddr;
	}
	
}

?>