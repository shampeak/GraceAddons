
<?php
/**
 * 单元测试
 */

/**
 * 获取底层config
 * 返回Config/Config.php里面定义的内容
 */
$res = \Application\Server::getInstance()->Config();
D($res);

/**
 * 获取server对象
 */
$ob = \Application\Server::getInstance();
var_dump($ob);

/**
 * 创建服务对象
 */
$db = \Application\Server::getInstance()->make('db');
$res = $db->getall("select * from user");
var_dump($res);

/**
 * 容器对象列表
 */
$list = \Application\Server::getInstance()->obList();
D($list);

/**
 * 创建服务对象[空]
 */
$db = \Application\Server::getInstance()->make('erwewer');
var_dump($db);

