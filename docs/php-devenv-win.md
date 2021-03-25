---
title: "Windows搭建PHP环境"
date: 2021-03-18T10:08:08+08:00
---
  关于Php:
- Non Thread Safe和“Thread Safe：    
使用Apache时，用“TS”，否则没有“php5apache2_4.dll”。    
- VC Redist    
V7.1/V7.4: [VS16部署包](https://aka.ms/vs/16/release/VC_redist.x64.exe)    

# Apache配置
- 路径
- php-apache
- 重写

## 路径
- 网站根目录    
替换“c:/Apache24/htdocs”为自己使用的路径
- 程序    
替换“c:/Apache24/”为自己Apache2.4的路径；

## php-apache
在配置文件(conf/httpd.conf)最后增加
- PHPV7.1:
```bash
#BEGIN PHP INSTALLER EDITS - REMOVE ONLY ON UNINSTALL
PHPIniDir "D:/progFiles/php-7.1"
LoadModule php7_module "D:/progFiles/php-7.1/php7apache2_4.dll"
# php httpd
AddType application/x-httpd-php .php
#END PHP INSTALLER EDITS - REMOVE ONLY ON UNINSTALL
```
- PHPV5.6:
```bash
#BEGIN PHP INSTALLER EDITS - REMOVE ONLY ON UNINSTALL
PHPIniDir "D:/progFiles/php-7.4"
LoadModule php7_module "D:/progFiles/php-7.4/php7apache2_4.dll"
# php httpd
AddType application/x-httpd-php .php
#END PHP INSTALLER EDITS - REMOVE ONLY ON UNINSTALL
```

## 重写
- a.打开模块
```bash
LoadModule rewrite_module modules/mod_rewrite.so
```
- b.允许重写
```bash
AllowOverride All
```

# 配置PHP(php.ini)
OPcache为php5.5+内置.
关于v7.2~v7.4,参见[mcrypt库](#mcrypt)
## extension设置
目录位置:
```bash
extension_dir = "D:/progFiles/php-7.1/ext"
extension_dir = "D:/progFiles/php-7.4/ext"
```
扩展文件：
```bash
extension=php_mbstring.dll
extension=php_mysqli.dll
```
在Dynamic Extensions最下面增加：
```bash
zend_extension = php_opcache.dll
```
## 开启opcache
>Note: 如果不加入"opcache.mmap_base = 0x20000000" 会出现“Fatal Error Unable to open base address file”错误

```bash
[opcache]
opcache.enable = 1
opcache.memory_consumption = 128
opcache.max_accelerated_files = 4000
opcache.revalidate_freq = 60
opcache.mmap_base = 0x20000000

; Required for Moodle
opcache.use_cwd = 1
opcache.validate_timestamps = 1
opcache.save_comments = 1
opcache.enable_file_override = 0
```

# 注册Windows服务
使用管理员权限运行reg_php_env.bat
```bash
@echo off
echo register begin... ...

set regpath=HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Session Manager\Environment

echo register APACHE2_HOME... ...

set envname1=APACHE2_HOME
set varpath1=D:\progFiles\Apache24
reg add "%regpath%" /v %envname1% /d %varpath1% /f

echo register MYSQL_HOME... ...

set envname2=MYSQL57_HOME
set varpath2=D:\progFiles\mysql-5.7
reg add "%regpath%" /v %envname2% /d %varpath2% /f

echo register modify path... ...
reg add "%regpath%" /v Path /t REG_EXPAND_SZ /d "%path%;%%APACHE2_HOME%%\bin;%%MYSQL57_HOME%%\bin;" /f
rem wmic ENVIRONMENT where "Name='path' and UserName='<system>'" set VariableValue="%path%;%%APACHE2_HOME%%\bin;%%MYSQL57_HOME%%\bin;"

echo register end... ...

echo Service List Begin... ...

echo Service HTTPD reg... ...
httpd.exe -k install
echo ...
echo Service HTTPD(apache2.4) Start... ...
net start apache2.4


echo Service MYSQLD Reg... ...
rem %MYSQL57_HOME%\bin\mysqld --install MySQL57 --defaults-file="D:\progFiles\mysql-5.7\my.ini"
%MYSQL56_HOME%\bin\mysqld -install MySQL56
echo ...
echo Service MYSQLD(mysql57) Start... ...
net start MySQL57

echo Service List End... ...

pause>nul
```

## 测试
> test.php
```bash
<?php
    header("Content-Type: text/html; charset=utf-8");
    phpinfo();
?>
```

# [phpMyAdmin](https://www.phpmyadmin.net/)
如果使用本机mysql则无需配置！
## 配置远程MySQL

- 1）建立配置文件    
  重命名config.sample.inc.php为config.inc.php
- 2）添加服务器信息    
  修改localhost值: 服务器IP。
```bash
$cfg['Servers'][$i]['host'] = '192.168.1.4';
```

# FAQ
## AH00526
```bash
AH00526: Syntax error on line 233 of D:/progFiles/Apache24/conf/httpd.conf:
Invalid command 'Order', perhaps misspelled or defined by a module not included in the server configuration
```
A: 去除如下配置语句的注释符。    
[Apache2.4启动时报AH00526错误（Invalid command 'Order'）](http://www.cnblogs.com/haries/p/4677383.html)

```bash
#LoadModule access_compat_module modules/mod_access_compat.so
```
## AH00072
```bash
Errors reported here must be corrected before the service can be started.
(OS 10048)通常每个套接字地址(协议/网络地址/端口)只允许使用一次。  : AH00072: make_sock: could not bind to address [::]:443
(OS 10048)通常每个套接字地址(协议/网络地址/端口)只允许使用一次。  : AH00072: make_sock: could not bind to address 0.0.0.0:443
AH00451: no listening sockets available, shutting down
AH00015: Unable to open logs
```
A: 关闭其他占用443端口的软件。
> 本机为VMware:
1)编辑->首选项    
2) 共享虚拟机        
i. 更改配置->禁用共享        
ii. 在“HTTPS”后面输入433，启用共享


<h1 id="mcrypt">mcrypt</h1>

## [down](https://pecl.php.net/package/mcrypt/1.0.4/windows)
|Php|mcrypt|
|-|-|
|7.4|[x64](https://windows.php.net/downloads/pecl/releases/mcrypt/1.0.4/php_mcrypt-1.0.4-7.4-ts-vc15-x64.zip)|
|7.3|[x64](https://windows.php.net/downloads/pecl/releases/mcrypt/1.0.4/php_mcrypt-1.0.4-7.3-ts-vc15-x64.zip)|
|7.2|[x64](https://windows.php.net/downloads/pecl/releases/mcrypt/1.0.4/php_mcrypt-1.0.4-7.2-ts-vc15-x64.zip)|

把php_mcrypt.dll拷贝到"ext"中.

## 配置
在Dynamic Extensions最上边添加如下:
```bash
extension=php_mcrypt.dll
```


# Reference
- [Apache install](http://httpd.apache.org/docs/2.4/platform/windows.html)
- [Apache Haus](http://www.apachehaus.com/cgi-bin/download.plx)
- [How to use PHP OPCache?](http://stackoverflow.com/questions/17224798/how-to-use-php-opcache)
- [OpCache文档](http://php.net/manual/zh/opcache.configuration.php)
- [微软停止支持PHP8](https://news-web.php.net/php.internals/110907)
