
<?php
/**
 * ��Ԫ����
 */

/**
 * ��ȡ�ײ�config
 * ����Config/Config.php���涨�������
 */
$res = \Application\Server::getInstance()->Config();
D($res);

/**
 * ��ȡserver����
 */
$ob = \Application\Server::getInstance();
var_dump($ob);

/**
 * �����������
 */
$db = \Application\Server::getInstance()->make('db');
$res = $db->getall("select * from user");
var_dump($res);

/**
 * ���������б�
 */
$list = \Application\Server::getInstance()->obList();
D($list);

/**
 * �����������[��]
 */
$db = \Application\Server::getInstance()->make('erwewer');
var_dump($db);

