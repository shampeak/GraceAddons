<?php
namespace App\Controller;


class Admin extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function doIndex_editPost()
    {
        echo 123;
    }

    public function doIndex_edit()
    {
        echo 'bianji';
    }

    public function doIndex_addPost()
    {
        echo 123;
    }

    public function doIndex_add()
    {
        echo 'tianjia';
    }

    public function doIndex_setPost()
    {
        echo 123;
    }
    public function doIndex_set()
    {
        echo '设定';
    }
    public function doIndex_operate()
    {
        echo '设定';
    }
    public function doIndex_log()
    {
        echo '设定';
    }

    public function doIndex(){

        //股票
        $res = app('db')->getall('select * from shares');
        //管理首页
        view('',[
            'res' => $res
        ]);

    }

}
