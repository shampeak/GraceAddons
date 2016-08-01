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
 * view对象
 */
$view = server('view');

echo '这个需要重写和更新 & smarty';



