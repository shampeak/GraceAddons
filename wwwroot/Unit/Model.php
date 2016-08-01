<?php

/**
 * 对application对象的测试
 * 用户server层和model层中间
 * 成熟和固化的应用对象层
 */

include("../../vendor/autoload.php");
define('APPROOT', '../../App/');

$error_reporting       = E_ALL ^ E_NOTICE;
ini_set('error_reporting', $error_reporting);


/**
 * 生成单例
 */
$res = \Application\Model::getInstance();

$res = \Application\Model::getInstance()->make('test');        //建立模型

$res = \Application\Model::getInstance()->make('test123123');        //空对象
$res->run();            //对象执行

var_dump($res);



exit;