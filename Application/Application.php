<?php

namespace Application;



class Application
{

    /*
    * @var null
    * wise单例调用
    */
    private static $_instance = null;       //单例调用

    //服务对象存储
    public $Providers       = array();             //服务对象存储 映射

    //对象实例
    public $Instances       = array();             //服务对象存储 实例

    /*
    * @param string $conf
    * 根据配置获取设定
    */
    private function __construct($voconfig = []){
        //遍历application目录下的文件,建立对象目录
        $this->Baseroot = __DIR__.'/';
        $this->Providers    = $this->load( __DIR__.'/Config/Application.php');           //对象映射

//        $this->FileReflect      = $voconfig['FileReflect'];         //配置文件映射
//        $this->Providers        = $voconfig['Providers'];           //对象映射

//
//        if(is_array($this->FileReflect)){
//            foreach($this->FileReflect as $key=>$file){
//                $this->ObjectConfig[ucfirst($key)] =  $this->load($file);
//            }
//        }
//        // print_r($this->ObjectConfig);       //获得配置 $this->ObjectConfig

    }

    /*
    |------------------------------------------------------------
    | 单例调用
    |------------------------------------------------------------
    */
    public static function getInstance($config = []){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }

    /*
    |------------------------------------------------------------
    | 实例化注册类
    |------------------------------------------------------------
    */
    public function make($abstract)
    {
        $abstract = ucfirst($abstract);
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }
        //未定义的服务类 返回空值;
        if (!isset($this->Providers[$abstract])) {
            return null;
        }
        // echo $abstract;
        $this->instances[$abstract] = $this->build($abstract);
        return $this->instances[$abstract];
    }

    /*
    |------------------------------------------------------------
    | 实例化一个模型
    |------------------------------------------------------------
    */
    public function makeModel($abstract)
    {
        if (isset($this->Mo[$abstract])) {
            return $this->Mo[$abstract];
        }
        if(!class_exists($abstract)){
            //没有找到执行方法
            //执行404;
            echo '<br>Miss file : <br>';
            echo $abstract;
            D();
        }
        //检查类文件是否存在
        $this->Mo[$abstract] = new $abstract();     //模型存储

        return $this->Mo[$abstract];
    }

    //禁止外部调用
    private function build($abstract)
    {
        $obj_ = $this->Providers[$abstract];
        $obj = new $obj_();
        return $obj;
    }

    /**
     * @return array
     * 容器对象列表
     */
    public function obList()
    {
        return $this->Providers;
    }

    public function load($file=''){
        if(file_exists($file)){
            return include $file;
        }
        return [];
    }

    /**
     * @return string
     * 解析文档数据
     */
    public function document()
    {
        $data = $this->documentData();
       // D($data);
        extract($data);
        if(empty($data['lm']) && empty($data['ar'])){
            include $this->Baseroot.'Document/Application/Index.php';
        }else{
            include $this->Baseroot.'Document/Application/Frame.php';
        }

        exit;
    }

    /**
     * @return string
     * 返回文档数据结构
     */
    public function documentData()
    {
        //list列表
        $path = $this->Baseroot.'Document/Application/';

        //定位需要两个变量 1 lm 2 ar
        $res['lm'] = ucfirst(strtolower($_GET['documentlm']));
        $res['ar'] = strtolower($_GET['documentar']);

        //扫描下面的文件夹
        $list = [];
        if(is_dir($path)){
            $dirall = scandir($path);
            foreach($dirall as $v) {
                if ($v != '.' && $v != '..') {
                    if(is_dir($path.$v))    $list[] = $v;
                }
            }
        }
        $res['list'] = $list;


        //当前的栏目
        $arlist = [];
        if(!empty($res['lm']) and in_array($res['lm'],$list)){     //例如 test
            //发现栏目请求''
            //扫描下面的所有文件
            $path = $path.$res['lm'];
            $arlist = [];
            if(is_dir($path)){
                $dirall = scandir($path);
                foreach($dirall as $v) {
                    if ($v != '.' && $v != '..') {
                        if(strtolower(substr($v,-3)) == '.md')   $arlist[] = $v;
                    }
                }
            }
        }
        $res['arlist'] = $arlist;


        //有具体文章,读取出文章标题,描述 和内容
        $arlistnr = $_arlistnr= [];
        if($arlist){
            foreach($arlist as $value){
                $arfile =  $path.'/'.$value;
                $nr = file_get_contents($arfile);
                $ar = explode("\n",$nr);
                $arlistnr[strtolower($value)]['title'] = trim($ar[0],'#>');
                $arlistnr[strtolower($value)]['des'] = trim($ar[1],'#>');
                $_arlistnr[strtolower($value)] = \Application\Server::getInstance()->make('Parsedown')->text($nr);
            }
        }

        $res['arlistnrlist'] = $arlistnr;
        $res['nr'] = $_arlistnr[strtolower($res['ar'])];

        return $res;
    }

}
