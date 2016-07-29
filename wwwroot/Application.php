
<?php

include("../vendor/autoload.php");
define('APPROOT', '../App/');

$error_reporting       = E_ALL ^ E_NOTICE;
//$error_reporting       = E_ALL;
////错误提示
ini_set('error_reporting', $error_reporting);
//or
//error_reporting(0);

//时区
//ini_set('date.timezone','Asia/Shanghai');


/**
 * 单元测试
 */


///**
// * 获取Application对象
// */
//$ob = \Application\Application::getInstance();
//var_dump($ob);


///**
// * 容器对象列表
// */
//$list = \Application\Application::getInstance()->obList();
//D($list);

/**
 * 实例化,并且执行
 */
//$test = \Application\Application::getInstance()->make('test');
//$test->run();
//


/**
 * 空对象
 */
//$test = \Application\Application::getInstance()->make('asdfasdf');
//$test->run();

/**
 * 对文档进行html解析
 */
//$res = \Application\Application::getInstance()->document();
//D($res);

/**
 * 随身带的文档系统
 */
\Application\Application::getInstance()->document();

