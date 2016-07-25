<?php
namespace App\Controller;


class My extends BaseController {

    public function __construct(){
        parent::__construct();
    }


    //首页的
    public function doIndex()
    {
        //遍历下面有哪些目录
        view('',[
            'res'=>$res
        ]);
    }


}
