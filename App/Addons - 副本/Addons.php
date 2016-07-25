<?php

namespace App\Addons;

//辅助函数加载
includeIfExist(dirname(__FILE__).'/Helper.php');

class Addons{ // class start

    public static $router        = array();     //路由字符串
    public static $request        = array();    //请求的参数
    //========================================================

    public static $root        = array();
    public static $addons      = array();       //插件
    public static $controller  = array();       //控制器
    public static $mothed      = array();       //方法
    public static $params      = array();       //扩展参数

    //根据参数设定路由
    /**
     * @param string $root
     * @param string $router
     *
     * @return bool
     * 创建控制器,前置检查
     */
    public static function Router($router = '')
    {
        $prefix = 'do';
        $type = req('Router')['type'];
        $root = SELF::$root;        //like E:\phpleague\Grace\My\App\Addons/

        //分解
        $routerar = explode('.',SELF::$router);
        $addons       = ucfirst(strtolower($routerar[0]));        //不能空

        //过滤器 文件夹是否存在
        $addonsroot = $root.$addons.'/';      //控制器根  like E:\phpleague\Grace\My\App\Addons/Dsmo/
        //首先判断插件文件夹是否存在
        if(!is_dir($addonsroot)){
            halt('Router error : addons path error!!'."<br>Isexist?: $addonsroot");
        }

        $controller   = isset($routerar[1])?ucfirst(strtolower($routerar[1])):'Home';
        $mothed       = isset($routerar[2])?ucfirst(strtolower($routerar[2])):'Index';
        $params       = isset($routerar[3])?$routerar[3]:'';

        //basecontroller Isexist?        //存在则include
        $file = $root.$addons.'/Controller/'.$controller.'/BaseController.php';             //like E:\phpleague\Grace\My\App\Addons/Demo/Controller/BaseController.php
        includeIfExist($file);

        //执行的方法名 和 控制器名
        $__controllerAction = '\App\Addons\\'.$controller;
        $__mothedAction     = ($type == 'GET')?($prefix.$mothed):($prefix.$mothed.ucfirst(strtolower($type)));      //like doIndex / doIndexPost
        $__mothedActionbk   = ($type == 'GET')?($prefix.$mothed.'_'.$params):($prefix.$mothed.'_'.$params.ucfirst(strtolower($type)));  //like doIndex_ex / doIndex_exPost
        //首先寻找action文件

        //controller/home/action.php        //对方法名进行检索没有
        $file = $addonsroot.'Controller/'.$controller.'/'.$mothed.'.php';
        includeIfExist($file);
        $_file[] = $file;

        if(!method_exists($__controllerAction, $__mothedActionbk) && !method_exists($__controllerAction, $__mothedAction)) {
            //没有寻找到,尝试 controller/controller.php
            $file = $basepath.$_controller.'/'.$_controller.'.php';
            $_file[] = $file;
            includeIfExist($file);
        }



D($file);



        D($__mothedActionbk);
        exit;


        //控制器_执行
        $__controllerAction = '\App\Addons\\'.self::$controller;
        D($__controllerAction);

        $_controller = '\App\Addons\\'.self::$controller;
        $__controllerAction = '\App\Addons\BaseController';




        D(self::$params);

        $prefix = 'do';
        $type = req('Router')['type'];

        echo self::$addons;

        echo 1;

        $__controllerAction = '\App\Addons\\'.self::$controller;
        $__controllerAction = '\App\Addons\BaseController';


        $test = new $__controllerAction();
        $test->test();
        exit;

    }

    //根据参数进行路由的执行方式    //根据get最终要统一到参数上来
    public static function Start($router = '',$request= array())         //入口 [带参数]
    {
        if(empty($router)) return false;        //路由空
        if(empty($request)) $request = array_merge($_GET, $_POST);

        self::$router  = $router;
        self::$request = $request;

        self::$root = dirname(__FILE__).'/';        //like E:\phpleague\Grace\My\App\Addons/
        self::Router($router);
        //$res = self::addonsDo();
        return $res;
    }

    /**
     * @param string $root
     * @return bool
     * 根据Get进行路由的执行方式
     */
    public static function Run()            //入口
    {
        $router = req('Get')['ao'];
        $request = array_merge($_GET, $_POST);
        return self::Start($router,$request);
    }

    /**
     * @return mixed
     * 执行控制器
     */
    public static function addonsDo()
    {
        // return $res;
    }

}
