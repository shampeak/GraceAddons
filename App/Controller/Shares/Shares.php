<?php
namespace App\Controller;


class Shares extends BaseController {

    public function __construct(){

        parent::__construct();
    }

    public function doAddPost()
    {
        $code = strtolower(req('Post')['code']);
        if(!$code){
            $this->AjaxReturn(-200);
        }

        $title =  Model('shares')->getTitle($code);
        $res = [
            'code'  =>  $code,
            'title' =>  $title,
        ];
        //检查重复
        if(empty($title) || $code == '200' ||  (Model('shares')->codeExist($code) ==true )){
            $this->AjaxReturn(-200);
        }else{
            app('db')->autoExecute('shareslist',$res,'INSERT');
            $this->AjaxReturn(200);
        }
    }
    /**
     * 添加
     */
    public function doAdd()
    {
        view('',[

        ]);
    }

    public function doIndexPost()
    {

        $res = [
            'code'  => req('Post')['code'],
            'num'   => req('Post')['num'],
            'price' => req('Post')['price'],
            'action'=> req('Post')['act']
        ];
        if(empty($res['code']) || empty($res['num']) || empty($res['price']) || empty($res['action']) ){
            $this->AjaxReturn(-200);
        }
        $res['dt'] = time();
        $info = Model('shares')->dbcodeInfo(req('Post')['code']);

        //计算剩余数量
        if(req('Post')['act'] == 'buy'){
            $res['shnum']   =   $info['num'] +  req('Post')['num'];
        }else{
            $res['shnum']   =   $info['num'] -  req('Post')['num'];
        }

        //计算剩余的均价
        if(req('Post')['act'] == 'buy'){
            $res['junjia']  = ($info['num']*$info['price'] + req('Post')['num']* req('Post')['price']) / ($info['num'] + req('Post')['num'] );
        }else{
            $res['junjia']  = ($info['num']*$info['price'] - req('Post')['num']* req('Post')['price']) / ($info['num'] - req('Post')['num'] );
        }

        /**
         * 均价 = (上次均价*总数量 - 本次操作*价格 - 手续费) / 剩余数量
         * 盈利 = 市值 - 数量*均价
         */

        app('db')->autoExecute('shares',$res,'INSERT');

        //获取数量和均价
        $listres['num']     = $res['shnum'] ;
        $listres['price']   = $res['junjia'];

        app('db')->autoExecute('shareslist',$listres,'UPDATE',"code = '{$res['code']}'");

        $this->AjaxReturn(200);

    }

    //首页的
    public function doIndex()
    {
        $code = req('Get')['code'];
        $_GET = req('Get');
        //获得股票价格
        $price = Model('shares')->getPrice($code);
        //遍历下面有哪些目录
        $shares = Model('shares')->getList();


        //操作记录列表
        //获取所有的操作记录
        $rc = app('db')->getall("SELECT * FROM `shares` where code = '$code' order by id desc");

        //获取价格
        view('',[
            'price'     => $price,
            'shares'    => $shares,
            'res'       => $res,
            'rc'        => $rc,
        ]);
    }

    /**
     * 修改,手续费
     */
    public function doEdit()
    {
        //获取价格
        view('',[
            'price'     => $price,
            'shares'    => $shares,
            'res'       => $res,
            'rc'        => $rc,
        ]);
    }


    /**
     * 记录回滚
     */
    public function doHuigun()
    {
        $id = req('Get')['id'];
        $sql = "delete FROM `shares` where id >$id";
        app('db')->query($sql);

        $rc = app('db')->getrow("select * from shares where id = $id");


        $nrc['num']     = $rc['shnum'];
        $nrc['price']   = $rc['junjia'];
        app('db')->autoExecute('shareslist',$nrc,'UPDATE',"code = '{$rc['code']}'");

        $this->AjaxReturn();
    }


}
