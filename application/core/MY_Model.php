<?php

/**
 * @filesource MY_Model.php
 *
 * @author xiaobin
 * @version 1.0
 * <br> date: 2013.10.08 </br>
 * @license Apache License Version 2.0
 *
 * @tutorial To inherit CI_Model the base class.
 */
class MY_Model extends CI_Model {
	/* The variables of the base class */
	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	protected $_timestamps = FALSE;
	
	public    $rules = array();
	
	public function __construct() {
		parent::__construct ();
	}
	
	/**
	 * <p> Read the specified conditions table data counts. </p>
	 *
	 * @param string where
	 * @param array $lang_id & $type_id
	 * @return integer
	 */
	public function get_count($where) {
		$this->db->where($where);
		$this->db->from($this->_table_name);
		return $this->db->count_all_results();
	}
	
	/**
	 * <p> wrapper get() method </p>
	 *
	 * @link  http://codeigniter.com/user_guide/database/active_record.html#select
	 *
	 * @access public
	 * @param string $id
	 * @param bool $single
	 */
	public function get($id = NULL, $single = FALSE) {
		// Single row(), multiple rows with result();
		if ($id != NULL) {
	
			// $this->db->where('id=', $id);
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
	
			$method = 'row';
		}
		elseif ($single == TRUE) {
			$method = 'row';
		}
		else {
			// https://github.com/bcit-ci/CodeIgniter/issues/3492
			//if (!count($this->db->ar_orderby)) {
			//	$this->db->order_by($this->_order_by, 'asc');
			//}
			// https://github.com/guzzle/guzzle/pull/2038
			//if(!count($this->db->order_by($this->_order_by))) {
			$objCount = $this->db->order_by($this->_order_by);
			if(!is_array($objCount) && $objCount instanceof Countable) {
				$this->db->order_by($this->_order_by, 'asc');
			}
			$method = 'result';
		}
	
		return $this->db->get($this->_table_name)->$method();
	}
	
	/**
	 * <p> Increase the SQL condition </p>
	 * <p> Then use our own get() </p>
	 *
	 * @access public
	 * @param string $where
	 * @param boolean $single
	 */
	public function get_by($where, $single = FALSE) {
		if ($where != '')
		    $this->db->where($where);
		
		return $this->get(NULL, $single);
	}
	
	/**
	 * <p> Use a custom SQL statement </p>
	 * <p> NOTE: This function does not use the CodeIgniter Database Class </p>
	 * 
	 * @param array $sqlCond
	 * @param string result column
	 * @return string
	 */
	public function get_like($sqlCond, $resultCol) {
	    /**
	     * <p> Changes to existing functions <p>
	     * @link http://php.net/manual/en/changelog.mysql.php
	     */
	    if (version_compare(PHP_VERSION, '5.5.0') >= 0) {
    		$conn = $this->_conn_i();
    		$result = $this->_myQuery_i($sqlCond, $resultCol, $conn);
	    }
	    else {
	    	$strHost = "127.0.0.1";
	    	$strPort = "3306";
	    	$strDbname = "carnumber";
	    	// "mysql:host=127.0.0.1;port=3306;dbname=carnumber;";
	    	$dsn = "mysql:"."host=".$strHost.";"."port=".$strPort.";"."dbname=".$strDbname.";";
	    	$conn = $this->_conn_pdo($dsn, "tdtc2014", "qazxsw");
	    	$result = $this->_myQuery_pdo($sqlCond, $resultCol, $conn);
	    }
		return $result;
	}
	
	/**
	 * <p> Join query </p>
	 * 
	 * @param string $col
	 * @param string $joinTable
	 * @param string $joinCond
	 * @param array $where
	 * @return array
	 */
	public function get_join_table($col, $joinTable, $joinCond, $where) {
		$this->db->select($col);
		$this->db->from($this->_table_name);
		$this->db->join($joinTable, $joinCond);
		$this->db->where($where);
		$this->db->order_by($this->_order_by, 'asc');
		return $this->db->get()->result();
	}
	
	/**
	 * <p> Sets the member variable in the array is empty </p>
	 *
	 * @access public
	 * @param string $
	 * @param array $data_mul
	 */
	public function set_spaces($data_mul) {
		$obj = new stdClass();
		
		foreach ($data_mul as $data_single) {
			$obj->$data_single = '';
		}
		return $obj;
	}
	
	/**
	 * <p> Its ID to decide whether to INSERT or UPDATE </p>
	 *
	 * @access public
	 * @param array $data
	 * @param string $id
	 * @return string
	 */
	public function save($data, $id = NULL) {
		// set timestamp
		if ($this->_timestamps == TRUE) {
			$now = date('Y-m-d H:i:s');
				
			$id || $data['created'] = $now;
			$data['modified'] = $now;
		}
		
		// insert
		if ($id === NULL) {
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
		}
		// update
		else {
			$filter = $this->_primary_filter;
			$id = $filter($id);
				
			$this->db->set($data);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
		}
		
		return $id;
	}
	
	/**
	 * <p> Based on the ID of a delete operation </p>
	 *
	 * @access public
	 * @param string $id
	 * @return boolean
	 */
	public function delete($id) {
		$filter = $this->_primary_filter;
		$id = $filter($id);
		
		if (!$id) {
			return FALSE;
		}
		
		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
		
	}
	
	/**
	 * <p> Array form post </p>
	 *
	 * @access public
	 * @param array $fields
	 * @return array
	 */
	public function array_form_post($fields) {
		$data = array();
	
		foreach ($fields as $field) {
			$data[$field] = $this->input->post($field);
		}
	
		return $data;
	}
	
	/**
	 * <h4> PHP Data Objects <h4>
	 * <p> http://php.net/manual/en/book.pdo.php <p>
	 * 
	 * <table border="1">
	 *   <tr>
	 *     <th>sn</th>
	 *     <th>function name</th>
	 *     <th>memo</th>
	 *   </tr>
	 *   <tr>
     *     <td>1</td>
     *     <td>PDO</td>
     *     <td>connect</td>
     *   </tr>
	 *   
	 * </table>
	 * 
	 * @link http://php.net/manual/en/ref.pdo-mysql.connection.php PDO_MYSQL DSN
	 */
    private function _conn_pdo($dsn, $usr, $pwd) {
		PDO : $result;
		$options = array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', 
		);
		try {
			$result = new PDO($dsn, $usr, $pwd, $options);
		}
		catch(PDOException $e) {
			throw new PDOException("Error  : " . $e->getMessage());
		}

		return $result;
	}
	
	/** 
	 * <h4> PHP Data Objects <h4>
	 * <p> http://php.net/manual/en/book.pdo.php <p>
	 * 
	 * <table border="1">
	 *   <tr>
	 *     <th>sn</th>
	 *     <th>function name</th>
	 *     <th>memo</th>
	 *   </tr>
	 *   <tr>
	 *     <td>1</td>
	 *     <td>prepare</td>
	 *     <td>Prepares a statement for execution and returns a statement object</td>
	 *   </tr>
	 *   <tr>
	 *     <td>2</td>
	 *     <td>bindColumn</td>
	 *     <td>Bind a column to a PHP variable</td>
	 *   </tr>
	 *   <tr>
	 *     <td>3</td>
	 *     <td>execute</td>
	 *     <td>Executes a prepared statement</td>
	 *   </tr>
	 *   <tr>
	 *     <td>4</td>
	 *     <td>fetch</td>
	 *     <td>Fetches the next row from a result set</td>
	 *   </tr>
	 *   
	 * </table>
	 * 
	 * @link http://php.net/manual/en/pdo.prepare.php prepare
	 * @link http://php.net/manual/en/pdostatement.bindcolumn.php bindColumn
	 * @link http://php.net/manual/en/pdostatement.execute.php execute
	 * @link http://php.net/manual/en/pdostatement.fetch.php fetch 
	 */
	private function _myQuery_pdo($sql, $resultCol, $conn) {
		$result = "";
		if (!$conn)
			die('Could not connect: ' . $conn->errorInfo());
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$stmt->bindColumn($resultCol, $results);
			while ($stmt->fetch(PDO::FETCH_BOUND)) {
				$result = $results;
			}
			return $result;
	}
	
	
	/**
	 * <h4> MySQL Improved Extension <h4>
	 * <p> http://php.net/manual/en/book.mysqli.php <p>
	 * 
	 * <table border="1">
     *   <tr>
     *     <th>sn</th>
     *     <th>method name</th>
     *     <th>memo</th>
     *   </tr>
     *   <tr>
     *     <td>1</td>
     *     <td>mysqli_connect</td>
     *     <td>connect</td>
     *   </tr>
     *   
     * </table>
     * 
     * @link http://php.net/manual/en/function.mysqli-connect.php mysqli_connect
	 */
	private function _conn_i() {
	    $conn = mysqli_connect("localhost","tdtc2014","qazxsw");
	    if (!$conn)
	        die('Could not connect: ' . mysqli_connect_error());
	    return $conn;
	}
	
	/**
	 * <h4> MySQL Improved Extension <h4>
	 * <p> http://php.net/manual/en/book.mysqli.php <p>
	 *
	 * <table border="1">
	 *   <tr>
	 *     <th>sn</th>
	 *     <th>method name</th>
	 *     <th>memo</th>
	 *   </tr>
	 *   <tr>
	 *     <td>1</td>
	 *     <td>mysqli_close</td>
	 *     <td>close connect</td>
	 *   </tr>
	 *
	 * </table>
	 *
	 * @link http://php.net/manual/en/mysqli.close.php mysqli_close
	 */
	private function _closeConn_i($conn) {
	    mysqli_close($conn);
	}
	
	/**
	 * <h4> MySQL Improved Extension <h4>
	 * <p> http://php.net/manual/en/book.mysqli.php <p>
	 *
	 * <table border="1">
	 *   <tr>
	 *     <th>sn</th>
	 *     <th>method name</th>
	 *     <th>memo</th>
	 *   </tr>
	 *   <tr>
	 *     <td>1</td>
	 *     <td>mysqli_select_db</td>
	 *     <td>choice Database</td>
	 *   </tr>
	 *   <tr>
	 *     <td>2</td>
	 *     <td>mysqli_query</td>
	 *     <td>SQL query</td>
	 *   </tr>
	 *   <tr>
	 *     <td>3</td>
	 *     <td>mysqli_fetch_assoc</td>
	 *     <td>Fetch a result row as an associative array</td>
	 *   </tr>
	 *
	 * </table>
	 *
	 * @link http://php.net/manual/en/mysqli.select-db.php mysqli_select_db
	 * @link http://php.net/manual/en/mysqli.query.php mysqli_query
	 * @link http://php.net/manual/en/mysqli-result.fetch-assoc.php mysqli_fetch_assoc
	 */	
	private function _myQuery_i($sql, $resultCol, $conn) {
	    if (!$conn)
	        die('Could not connect: ' . mysqli_connect_error());
	
	    $db_selected = mysqli_select_db($conn, "carnumber");
	    $result = mysqli_query($conn, $sql);

	    $row = mysqli_fetch_assoc($result);
        
        return  $row[$resultCol];
	}
}

?>