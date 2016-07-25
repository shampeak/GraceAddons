<?php
namespace App\Controller;


class Addons extends BaseController {

    public function __construct(){
        parent::__construct();
    }


    public function doIndexPost()
    {
        $res = \App\Addons\Addons::Run();       //执行
    }

    public function doIndex()
    {
        /**
         * 直接根据$_GET['ao'] 进行路由
         * 用在功能性操作
         */
        $res = \App\Addons\Addons::Run();       //执行
        exit;
echo 123;
exit;
echo '---';
echo $res;
        echo '---';

        exit;



        /**
         * 根据参数进行路由 like 'addons.user.home.index
         * $router 默认 addons => addons.welcome.home.index
         * $baseurl 特殊情况下制定调用的路径 $baseurl = /admin/?be=9 默认,当前路径去除ad参数
         * $request为参数 默认$_GET+$_POST
         */
        \App\Addons\Addons::Start($routerstr,$baseurl,$request);

        \App\Addons\Addons::Start('addons'); //出管理界面=>对所有addons进行管理

        /**
         * 注意 ,严格避开mcae路由参数
         * 约定,参数用ad开头
         * 例如 adc / adm /ade
         */

        //or    \App\Addons\Addons::Start('demo.home.index',$params);               //运行
        exit;

        //$shares 获取列表
        $shares =  Model('shares')->getList();
        view('',[
            'shares'    => $shares,
            'res'       => $res
        ]);
    }

}
