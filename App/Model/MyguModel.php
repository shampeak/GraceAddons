<?php
/**
 * Created by PhpStorm.
 * User: shampeak
 * Date: 2016/6/19
 * Time: 18:44
 */

namespace App\Model;


class MyguModel
{

    public function __construct(){
    }

    //设定全部,或者设定某一项
    public function set($value = array(),$key = '')
    {
        app('Mmcfile')->file('Mygu.json')->set($value,$key);
    }

    //获取设定的数据
    public function get($key = '')
    {
        return app('Mmcfile')->file('Mygu.json')->get($key);
    }


}