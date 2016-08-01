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
$req = server('req');


//D($req);
//D($req->env);
//D($req->path);
//D($req->query);
//D($req->getquery);
//D($req->getpath);
//D($req->get);
//D($req->post);

