
<?php
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
//\Application\Application::getInstance()->document();

/**
 * 返回文档数据
 */
$res = \Application\Application::getInstance()->documentData();
D($res);
