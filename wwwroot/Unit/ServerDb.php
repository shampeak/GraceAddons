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
 * db对象
 */
$db = server('db');
//D($d/b);


/**
 * getall方法
 */
$res = $db->getall("select * from user");
$res = $db->getall("select * from user",'uid');
$res = $db->getrow("select * from user");
$res = $db->getone("select uid from user");
$res = $db->getcol("select uid from user");

D($res);

