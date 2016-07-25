<?php
namespace App\Controller;


class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function doIndex()
    {

        //$shares 获取列表
        $shares = [
            '600'=>[
                'code'  => 600,
                'title' => '永泰1',
            ],
            '601'=>[
                'code'  => 600,
                'title' => '永泰1',
            ],
            '602'=>[
                'code'  => 600,
                'title' => '永泰1',
            ],
        ];
        view('',[
            'shares'    => $shares,
            'res'       => $res
        ]);
    }

}
