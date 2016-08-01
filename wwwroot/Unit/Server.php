<?php

/**
 * server层,主要是对底层服务对象进行封装,可以直接调用
 *
 */

include("../../vendor/autoload.php");
define('APPROOT', '../../App/');

$error_reporting       = E_ALL ^ E_NOTICE;
ini_set('error_reporting', $error_reporting);




/**
 * 底层配置
 */
//$res = \Application\Server::getInstance()->Config();
//D($res);

/**
 * 单例
 */
//$ob = \Application\Server::getInstance();
//var_dump($ob);

/**
 * db对象
 */
//$db = \Application\Server::getInstance()->make('db');
//$res = $db->getall("select * from user");
//var_dump($res);

/**
 * 对象列表
 */
$list = \Application\Server::getInstance()->obList();
D($list);

/**
 * 空对象
 */
//$db = \Application\Server::getInstance()->make('erwewer');
//var_dump($db);

/**
 * 快捷函数 server
 */
//$db = server('db');
//$res = $db->getall("select * from user");
//D($res);
