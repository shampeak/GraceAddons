<?php

namespace Application;

/*
|------------------------------------------------------
| ��ע���������һ���࣬���ҷ���
|------------------------------------------------------

*/

class Server
{
    /*
    * @var null
    * ��������
    */
    private static $_instance = null;       //��������
    //�������������Ϣ�洢
    public $ObjectConfig    = array();          //�������������Ϣ�洢
    //�������洢
    public $Providers       = array();             //�������洢 ӳ��
    //����ӳ��
    public $FileReflect     = array();           //�������洢 ӳ��
    //����ʵ��
    public $Instances       = array();             //�������洢 ʵ��
    private $Baseroot = '';

    //��ȡ��������
    public function Config(){
        return $this->load(__DIR__.'/Config/Config.php');
    }

    /*
    * @param string $conf
    * �������û�ȡ�趨
    */
    private function __construct($voconfig = []){
        $this->Baseroot = __DIR__.'/';
        $_ObjectConfig    = $this->load( __DIR__.'/Config/Server.php');           //����ӳ��
        $this->FileReflect      = $_ObjectConfig['FileReflect'];         //�����ļ�ӳ��
        $this->Providers        = $_ObjectConfig['Providers'];           //����ӳ��

        if(is_array($this->FileReflect)){
            foreach($this->FileReflect as $key=>$file){
                $this->ObjectConfig[ucfirst($key)] =  $this->load($this->Baseroot.$file);
            }
        }
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


    /**
     * @return array
     * ���������б�
     */
    public function obList()
    {
        return $this->Providers;
    }

    /*
    |------------------------------------------------------------
    | �������
    |------------------------------------------------------------
    */
    public function make($abstract,$parameters=[])
    {
        $abstract = ucfirst($abstract);
        if (isset($this->Instances[$abstract])) {
            return $this->Instances[$abstract];
        }
        //δ����ķ����� ���ؿ�ֵ;
        if (!isset($this->Providers[$abstract])) {
            return null;
        }
        // echo $abstract;
        $parameters = $parameters?:isset($this->ObjectConfig[$abstract])?$this->ObjectConfig[$abstract]:[];
        $this->Instances[$abstract] = $this->build($abstract,$parameters);
        return $this->Instances[$abstract];
    }

    /**    //��ֹ�ⲿ����
     * @param       $abstract
     * @param array $parameters
     * ʵ����
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
     * ���������ļ�
     * @return array|mixed
     */
    public function load($file=''){
        if(file_exists($file)){
            return include $file;
        }
        return [];
    }

}
