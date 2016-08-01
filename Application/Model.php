<?php

namespace Application;

/*
|------------------------------------------------------
| 在注册表中生成一个类，并且返回
|------------------------------------------------------
\Application\Model::get($make = null);
$res = \Application\Model::getInstance()->make('asdfasdf',$params);   //空对象
*/

class Model
{

    /*
    * @var null
    */
    private static $_instance = null;       //单例调用
    //对象实例
    public $instances       = array();             //服务对象存储 实例

    /*
    * @param string $conf
    * 根据配置获取设定
    */
    private function __construct($config = []){
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
    public function make($abstract,$parameters=[])
    {
        $abstract = ucfirst($abstract);
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }


        // echo $abstract;
        $parameters = $parameters?:isset($this->ObjectConfig[$abstract])?$this->ObjectConfig[$abstract]:[];
        $this->instances[$abstract] = $this->build($abstract,$parameters);
        return $this->instances[$abstract];
    }

    //禁止外部调用
    private function build($abstract, array $parameters = [])
    {
        $model = "\\Application\\Model\\".$abstract;      //模型
        //检查文件是否存在,不存在,则返回false;
        $file = __DIR__."/Model/".$abstract.'.php';
        if(!is_file($file)){
            return null;
        }

        $obj = new $model($parameters);
        return $obj;
    }

}
