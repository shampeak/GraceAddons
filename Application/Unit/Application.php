
<?php
/**
 * ��Ԫ����
 */


///**
// * ��ȡApplication����
// */
//$ob = \Application\Application::getInstance();
//var_dump($ob);


///**
// * ���������б�
// */
//$list = \Application\Application::getInstance()->obList();
//D($list);

/**
 * ʵ����,����ִ��
 */
//$test = \Application\Application::getInstance()->make('test');
//$test->run();
//


/**
 * �ն���
 */
//$test = \Application\Application::getInstance()->make('asdfasdf');
//$test->run();

/**
 * ���ĵ�����html����
 */
//\Application\Application::getInstance()->document();

/**
 * �����ĵ�����
 */
$res = \Application\Application::getInstance()->documentData();
D($res);
