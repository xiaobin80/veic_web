Upgrade
========

Changed Version:    
PHP: V5.6+ -> V7.0+    
CI:  V2.2+ -> V3.0+    


1. index.php    
    使用CI中的index.php替换掉en-us、ja-jp、zh-cn中的index.php    

 替换前的错误提示：    
-----------------     
 Notice: Use of undefined constant VIEWPATH - assumed 'VIEWPATH' in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 241    

Warning: include(VIEWPATHerrors\html\error_php.php): failed to open stream: No such file or directory in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 268    

Warning: include(): Failed opening 'VIEWPATHerrors\html\error_php.php' for inclusion (include_path='.;C:\php\pear') in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 268    

Notice: Use of undefined constant VIEWPATH - assumed 'VIEWPATH' in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 241    

Warning: include(VIEWPATHerrors\html\error_php.php): failed to open stream: No such file or directory in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 268    

Warning: include(): Failed opening 'VIEWPATHerrors\html\error_php.php' for inclusion (include_path='.;C:\php\pear') in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 268    

Notice: Use of undefined constant VIEWPATH - assumed 'VIEWPATH' in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 241    

Warning: include(VIEWPATHerrors\html\error_php.php): failed to open stream: No such file or directory in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 268    

Warning: include(): Failed opening 'VIEWPATHerrors\html\error_php.php' for inclusion (include_path='.;C:\php\pear') in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 268    

Notice: Use of undefined constant VIEWPATH - assumed 'VIEWPATH' in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 241    

Warning: include(VIEWPATHerrors\html\error_php.php): failed to open stream: No such file or directory in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 268    

Warning: include(): Failed opening 'VIEWPATHerrors\html\error_php.php' for inclusion (include_path='.;C:\php\pear') in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 268    

(1) 增加时区    
   1) en-us     
/*    
 *---------------------------------------------------------------     
 * Set time zone    
 *---------------------------------------------------------------    
 */    
    //America/Los_Angeles    
	//America/Chicago    
	//America/Detroit    
    date_default_timezone_set('America/New_York');    
    
   2) ja-jp    
/*    
 *---------------------------------------------------------------    
 * Set time zone    
 *---------------------------------------------------------------    
 */    
date_default_timezone_set('Asia/Tokyo');    

   3) zh-cn    
/*    
 *---------------------------------------------------------------    
 * Set time zone    
 *---------------------------------------------------------------    
 */    
date_default_timezone_set('Asia/Shanghai');    

(2) 修改路径    
  1) system    
       由'system'变更为'../system'    
  2) application    
       由'application'变更为'../application'    
       
 2. errors文件夹    
    (1) 删除原有的application/errors文件夹.    
    (2) 拷贝CI3下的errors文件夹到同级位置（application/views/errors）    
        
 移动前的错误提示：    
-----------------     
Warning: include(D:\WEB\wwwroot\veic_web\application\views\errors\html\error_php.php): failed to open stream: No such file or directory in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 268    

Warning: include(): Failed opening 'D:\WEB\wwwroot\veic_web\application\views\errors\html\error_php.php' for inclusion (include_path='.;C:\php\pear') in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 268    

Warning: include(D:\WEB\wwwroot\veic_web\application\views\errors\html\error_php.php): failed to open stream: No such file or directory in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 268    

Warning: include(): Failed opening 'D:\WEB\wwwroot\veic_web\application\views\errors\html\error_php.php' for inclusion (include_path='.;C:\php\pear') in D:\WEB\wwwroot\veic_web\system\core\Exceptions.php on line 268    
    
3. database.php    
      $db['default']['dbdriver'] = 'mysql';    
      变更为    
      $db['default']['dbdriver'] = 'mysqli';    
      
  (1) application/config/development    

  (2) application/config/production    


 修改前的错误提示：    
-----------------    
An uncaught Exception was encountered    

Type: Error    

Message: Call to undefined function mysql_connect()    

Filename: D:\WEB\wwwroot\veic_web\system\database\drivers\mysql\mysql_driver.php    

Line Number: 136    

4. MY_Model.php    
    if (!count($this->db->ar_orderby)) {    
变更为    
    if(!count($this->db->order_by($this->_order_by))) {    

 修改前的错误提示：    
-----------------    
A PHP Error was encountered    

Severity: Notice    

Message: Undefined property: CI_DB_mysqli_driver::$ar_orderby    

Filename: core/MY_Model.php    

Line Number: 65    
