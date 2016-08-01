<?php
/*
 |------------------------------------------------
 | 类文件和配置文件注册
 |------------------------------------------------
 */

return [

    'FileReflect'  => [
        'Smarty'   => 'Config/Smarty.php',
        'Db'       => 'Config/Db.php',
        'Cookies'  => 'Config/Cookies.php',
        'Adminauth'=> 'Config/Adminauth.php',
        'Mmcfile'  => 'Config/Mmcfile.php',
    ],

    'Providers'=>[
        'Smarty'    => Grace\Smarty\Smarty::class,
        'Req'       => Grace\Req\Req::class,             //
        'View'      => Grace\View\View::class,           //
        'Db'        => Grace\Db\Db::class,
        'Parsedown' => Parsedown::class,
        'Cookies'   => Grace\Cookies\Cookies::class,
        'Adminauth'   => Grace\Adminauth\Adminauth::class,
    ],

];
