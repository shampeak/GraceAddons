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
//$ob = \Application\Application::getInstance();
//var_dump($ob);


/**
 * 对象列表
 */
$list = \Application\Application::getInstance()->obList();
D($list);

/**
 * 生成对象
 */
//$test = \Application\Application::getInstance()->make('test');
//$test->run();
//


/**
 * 空对象
 */
//$test = \Application\Application::getInstance()->make('asdfasdf');
//$test->run();
