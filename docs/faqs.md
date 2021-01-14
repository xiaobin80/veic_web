---
title: "veic web的版本使用问题"
date: 2020-04-11T21:08:39+08:00
---
> 推荐PHP版本[v5.6.40/v7.1.33](https://windows.php.net/downloads/releases/archives/)

# 1. [v0.1](https://github.com/xiaobin80/veic_web/archive/v0.1-alpha.zip)

## 1）Only variable references should be returned by reference
https://github.com/xiaobin80/veic_web/commit/87d0970a3d714372822656fc5189655655f46e11

![php encountered](https://gitee.com/xiaobin80/csdn/raw/master/images/20190601144425762.png)

```php
return $_config[0] =& $config;
```
==>

```php
$_config[0] =& $config;
return $_config[0];
```

## 2) sqli
> 从PHP5.5之后，会出现
>> Deprecated: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead in xxx

提示mysql_connect()未来将要被移出。

>官网的[changelong](http://php.net/manual/en/changelog.mysql.php)
注意: php7.0.x已经移除了mysql.

在php.ini(windows)中注释掉
```bash
;extension=php_mysql.dll
```

# 2. mcrypt
> php7.2~php7.4

使用 错误抑制符 停止提示。
修改Encrypt.php（.\system\libraries\）
- Ln291
```php
$init_size = @mcrypt_get_iv_size($this->_get_cipher(), $this->_get_mode());
```
- 
- Ln300
```php
return rtrim(@mcrypt_decrypt($this->_get_cipher(), $key, $data, $this->_get_mode(), $init_vect), "\0");
```
