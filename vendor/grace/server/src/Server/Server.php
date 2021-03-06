<?php

namespace Grace\Server;

/*
|------------------------------------------------------
| 在注册表中生成一个类，并且返回
|------------------------------------------------------

*/

class Server
{
    /*
    * @var null
    * 单例调用
    */
    private static $_instance = null;       //单例调用
    //服务对象配置信息存储
    public $ObjectConfig    = array();          //服务对象配置信息存储
    //服务对象存储
    public $Providers       = array();             //服务对象存储 映射
    //对象映射
    public $FileReflect     = array();           //服务对象存储 映射
    //对象实例
    public $Instances       = array();             //服务对象存储 实例
    private $Baseroot = '';

    public function ConfigRoot($Baseroot)
    {
        if(!empty($Baseroot)){
            $this->Baseroot = $Baseroot?:__DIR__.'/Config/';
            $_ObjectConfig    = $this->load( $this->Baseroot.'Server.php');           //对象映射
            $this->FileReflect      = $_ObjectConfig['FileReflect'];         //配置文件映射
            $this->Providers        = $_ObjectConfig['Providers'];           //对象映射

            if(is_array($this->FileReflect)){
                foreach($this->FileReflect as $key=>$file){
                    $this->ObjectConfig[ucfirst($key)] =  $this->load($this->Baseroot.$file);
                }
            }
        }
        return $this;
    }

    public function Config($key)
    {
        return $this->ObjectConfig[ucfirst($key)] ;
    }
    /*
    * @param string $conf
    * 根据配置获取设定
    */
    private function __construct($Baseroot){
        if(!empty($Baseroot)){
            $this->Baseroot = $Baseroot?:__DIR__.'/Config/';
            $_ObjectConfig    = $this->load($this->Baseroot.'Server.php');           //对象映射
            $this->FileReflect      = $_ObjectConfig['FileReflect'];         //配置文件映射
            $this->Providers        = $_ObjectConfig['Providers'];           //对象映射

            if(is_array($this->FileReflect)){
                foreach($this->FileReflect as $key=>$file){
                    $this->ObjectConfig[ucfirst($key)] =  $this->load($this->Baseroot.$file);
                }
            }
        }
    }



    /*
    |------------------------------------------------------------
    | 单例调用
    |------------------------------------------------------------
    */
    public static function getInstance($Baseroot = ''){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self($Baseroot);
        }
        return self::$_instance;
    }


    /**
     * @return array
     * 容器对象列表
     */
    public function obList()
    {
        return $this->Providers;
    }

    /*
    |------------------------------------------------------------
    | 对象调用
    |------------------------------------------------------------
    */
    public function make($abstract,$parameters=[])
    {
        $abstract = ucfirst($abstract);
        if (isset($this->Instances[$abstract])) {
            return $this->Instances[$abstract];
        }
        //未定义的服务类 返回空值;
        if (!isset($this->Providers[$abstract])) {
            return null;
        }
        // echo $abstract;
        $parameters = $parameters?:isset($this->ObjectConfig[$abstract])?$this->ObjectConfig[$abstract]:[];
        $this->Instances[$abstract] = $this->build($abstract,$parameters);
        return $this->Instances[$abstract];
    }

    /**    //禁止外部调用
     * @param       $abstract
     * @param array $parameters
     * 实例化
     * @return mixed
     */
    private function build($abstract, array $parameters = [])
    {
        $obj_ = $this->Providers[$abstract];
        $obj = new $obj_($parameters);
        return $obj;
    }

    /**
     * @param string $file
     * 载入配置文件
     * @return array|mixed
     */
    public function load($file=''){
        if(file_exists($file)){
            return include $file;
        }
        return [];
    }

}
