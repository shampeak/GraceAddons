<?php

namespace Application;

/*
|------------------------------------------------------
| ��ע���������һ���࣬���ҷ���
|------------------------------------------------------
\Application\Bootstrap::run($make = null, $parameters = []);


//        if (is_null($make)) {
//            return Grace\Vo\Vo::getInstance('../App/');
//        }
//        return Grace\Vo\Vo::getInstance('../App/')->make($make, $parameters);
*/




class Bootstrap
{

    public static function run(){
        echo 121233;
    }

    /*
    * @var null
    * wise��������
    */
    private static $_instance = null;       //��������
    public $Mo              = array();             //�������洢 ӳ��
    //�������洢
    public $Providers       = array();             //�������洢 ӳ��
    //�������������Ϣ�洢
    public $ObjectConfig    = array();          //�������������Ϣ�洢

    //����ӳ��
    public $FileReflect     = array();           //�������洢 ӳ��
    //����ʵ��
    public $instances       = array();             //�������洢 ʵ��

    /*
    * @param string $conf
    * �������û�ȡ�趨
    */
    private function __construct($voconfig = []){
        $this->FileReflect      = $voconfig['FileReflect'];         //�����ļ�ӳ��
        $this->Providers        = $voconfig['Providers'];           //����ӳ��

        if(is_array($this->FileReflect)){
            foreach($this->FileReflect as $key=>$file){
                $this->ObjectConfig[ucfirst($key)] =  $this->load($file);
            }
        }
        // print_r($this->ObjectConfig);       //������� $this->ObjectConfig
    }

    /*
    |------------------------------------------------------------
    | ��������
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
    | ʵ����ע����
    |------------------------------------------------------------
    */
    public function make($abstract,$parameters=[])
    {
        $abstract = ucfirst($abstract);
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }
        //δ����ķ����� ���ؿ�ֵ;
        if (!isset($this->Providers[$abstract])) {
            return null;
        }
        // echo $abstract;
        $parameters = $parameters?:isset($this->ObjectConfig[$abstract])?$this->ObjectConfig[$abstract]:[];
        $this->instances[$abstract] = $this->build($abstract,$parameters);
        return $this->instances[$abstract];
    }

    /*
    |------------------------------------------------------------
    | ʵ����һ��ģ��
    |------------------------------------------------------------
    */
    public function makeModel($abstract)
    {
        if (isset($this->Mo[$abstract])) {
            return $this->Mo[$abstract];
        }
        if(!class_exists($abstract)){
            //û���ҵ�ִ�з���
            //ִ��404;
            echo '<br>Miss file : <br>';
            echo $abstract;
            D();
        }
        //������ļ��Ƿ����
        $this->Mo[$abstract] = new $abstract();     //ģ�ʹ洢

        return $this->Mo[$abstract];
    }

    //��ֹ�ⲿ����
    private function build($abstract, array $parameters = [])
    {
        $obj_ = $this->Providers[$abstract];
        $obj = new $obj_($parameters);
        return $obj;
    }

}
