<?php
namespace App\Controller;


class My extends BaseController {

    public function __construct(){

        parent::__construct();
    }


    public function doGu_setPost()
    {
        Model('mygu')->set(req('Post'));
        $this->AjaxReturn();
    }

    //设置
    public function doGu_set()
    {

        view('',[
            'res'=>Model('mygu')->get()
        ]);
    }

    //首页的
    public function doGu_add()
    {
        //遍历下面有哪些目录
        view('',[
            // 'res'=>$res
        ]);
    }


    //首页的
    public function doGu()
    {
        //遍历下面有哪些目录
        view('',[
            'res'=>$res
        ]);
    }


}
