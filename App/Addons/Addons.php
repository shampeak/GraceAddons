<?php

namespace App\Addons;

//辅助函数加载
includeIfExist(dirname(__FILE__).'/Helper.php');

/**
 * Class views
 * @package App\Addons
 * 被控制器集成,能够直接使用smarty
 * 使用
 * $this->assign([
 *      'ma' => $ma,
 *      'mb' => $ma,
 *      'mc' => $ma,
 * ])
 * $this->fetch()
 * $this->display()
 * $this->viewroot()
 */

//注意 要对smarty 对象增加path方法
/**
 * Class views
 * @package App\Addons
 */
class Model{ // class start
    //调用模型
    public function Run($modelname)
    {
        $modelname = ucfirst(strtolower($modelname));
        $file   = req('addonsRouter')['root']."Model/$modelname"."Model.php";
        $fileEx = req('addonsRouter')['addonsroot']."Model/$modelname"."Model.php";

        if(file_exists($fileEx)){
            include $fileEx;
        }else if(file_exists($file)){
            include $file;
        }

        $model = "\\App\\Addons\\Model\\$modelname"."Model";
        return new $model();
    }


}

class Views{ // class start

    public function fetch($tpl = '',$data = array())
    {
        $path = req('addonsRouter')['addonsroot'].'Views/';
        //D(req('addonsRouter'));
        return app('smarty')->path($path)->router([
            'controller'=> req('addonsRouter')['controller'],
            'mothed'    => req('addonsRouter')['mothed'],
            'params'    => req('addonsRouter')['params'],
        ])->fetch($tpl,$data);
    }

    public function display($tpl = '',$data = array())
    {
        $path = req('addonsRouter')['addonsroot'].'Views/';


        //D(req('addonsRouter'));
        app('smarty')->path($path)->router([
            'controller'=> req('addonsRouter')['controller'],
            'mothed'    => req('addonsRouter')['mothed'],
            'params'    => req('addonsRouter')['params'],
        ])->display($tpl,$data);
    }

    public function assign($key = null, $value = [])
    {
        if(is_array($key)){
            app('smarty')->assign($key);
        }else{
            app('smarty')->assign($key,$value);
        }
    }

}

class Addons{ // class start

    /**
     * 设置路由req('addonsRouter')
     */
    public static function Router()
    {
        $ad         = req('addonsEntrance')['ad'];
        $root       = req('addonsEntrance')['root'];
        $type       = req('addonsEntrance')['type'];
        $prefix     = req('addonsEntrance')['prefix'];
        $routerar   = explode('.',$ad);
        $addons     = ucfirst(strtolower($routerar[0]));        //不能空

        //过滤器 : 文件夹是否存在
        $addonsroot = $root.$addons.'/';      //控制器根  like E:\phpleague\Grace\My\App\Addons/Dsmo/

        //建立cae
        $controller   = !empty($routerar[1])?ucfirst(strtolower($routerar[1])):'Home';
        $mothed       = !empty($routerar[2])?ucfirst(strtolower($routerar[2])):'Index';
        $params       = !empty($routerar[3])?$routerar[3]:'';

        //执行的方法名 和 控制器名
        $__controllerAction = '\App\Addons\\'.$controller;
        $__mothedAction     = ($type == 'GET')?($prefix.$mothed):($prefix.$mothed.ucfirst(strtolower($type)));      //like doIndex / doIndexPost
        $__mothedActionExt  = ($type == 'GET')?($prefix.$mothed.'_'.$params):($prefix.$mothed.'_'.$params.ucfirst(strtolower($type)));  //like doIndex_ex / doIndex_exPost

        //拦截器 判断插件文件夹是否存在
        if(!is_dir($addonsroot)){
            halt('Router error : Addons path error!!'."<br>isExist?: $addonsroot");
        }else if(!is_dir($addonsroot.'Controller/'.$controller)){            //拦截器 判断控制器文件夹是否存在
            halt('Router error : Controller path error!!'."<br>isExist?: ".$addonsroot.'Controller/'.$controller);
        }

        //basecontroller Isexist?        //存在则include
        $file = $addonsroot.'/Controller/'.$controller.'/BaseController.php';             //like E:\phpleague\Grace\My\App\Addons/Demo/Controller/BaseController.php
        includeIfExist($file);

        //controller/home/action.php        //对方法名进行检索没有
        $file = $addonsroot.'Controller/'.$controller.'/'.$mothed.'.php';
        includeIfExist($file);
        $_file[] = $file;

        if(!method_exists($__controllerAction, $__mothedActionExt) && !method_exists($__controllerAction, $__mothedAction)) {
            //没有寻找到,尝试 controller/controller.php
            $file = $addonsroot.'Controller/'.$controller.'/'.$controller.'.php';
            includeIfExist($file);
            $_file[] = $file;
        }

        if(!method_exists($__controllerAction, $__mothedActionExt) && !method_exists($__controllerAction, $__mothedAction)) {
            halt('ControllerMothed error : <br>isMothedExist?'."<br>$__controllerAction :: $__mothedActionExt"."<br>$__controllerAction :: $__mothedAction");
        }

        req('addonsRouter',[
            'root'      => $root,
            'addonsroot'=> $addonsroot,
            'addons'    => $addons,
            'controller'=> $controller,
            'mothed'    => $mothed,
            'params'    => $params,
            'prefix'    => $prefix,
            'type'      => $type,
            'controllerAction'  => $__controllerAction,
            'mothedAction'      => $__mothedAction,
            'mothedActionExt'   => $__mothedActionExt,
        ]);

    }

    /**
     * @return mixed
     * 执行控制器返回执行的结果
     */
    public static function RunController()
    {
        $__controllerAction = req('addonsRouter')['controllerAction'];
        $__mothedActionExt  = req('addonsRouter')['mothedAction'];
        $__mothedAction     = req('addonsRouter')['mothedActionExt'];

        if(method_exists($__controllerAction, $__mothedActionExt)) {
            $_controller = new $__controllerAction();
            return $_controller->$__mothedActionExt();
        }else if(method_exists($__controllerAction, $__mothedAction)){
            $_controller = new $__controllerAction();
            return $_controller->$__mothedAction;
        }else{
            halt('RunController error : unknow');
        }
    }

    /**
     * @param array $request
     * @param string $baseurl
     * @return bool
     * 注意这里的多态设计
     */
    public static function Start($ad = '',$baseurl = '' ,$request = array())         //入口 [带参数]
    {
        if(empty($ad)) return false;        //路由空
        $baseurl = $baseurl?:('/'.app('req')->env['path'].'?'.app('req')->env['query']);
        $request = $request?:array_merge($_GET, $_POST);
        //完成三个参数的初始化

        //初始参数进入总线
        req('addonsEntrance',[
            'ad'        => $ad,
            'baseurl'   => $baseurl,
            'request'   => $request,
            'prefix'    => 'do',
            'type'      => req('Router')['type'],
            'root'      => dirname(__FILE__).'/',       //like E:\phpleague\Grace\My\App\Addons/
        ]);

        self::Router();        //设置路由
        $res = self::RunController();
        return $res;
    }

    /**
     * @param string $root
     * @return bool
     * 根据Get进行路由的执行方式
     */
    public static function Run()            //入口
    {
        return self::Start($_GET['ad']);
    }

}
