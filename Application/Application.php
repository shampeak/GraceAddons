<?php

namespace Application;



class Application
{

    /*
    * @var null
    * wise��������
    */
    private static $_instance = null;       //��������

    //�������洢
    public $Providers       = array();             //�������洢 ӳ��

    //����ʵ��
    public $Instances       = array();             //�������洢 ʵ��

    /*
    * @param string $conf
    * �������û�ȡ�趨
    */
    private function __construct($voconfig = []){
        //����applicationĿ¼�µ��ļ�,��������Ŀ¼
        $this->Baseroot = __DIR__.'/';
        $this->Providers    = $this->load( __DIR__.'/Config/Application.php');           //����ӳ��

//        $this->FileReflect      = $voconfig['FileReflect'];         //�����ļ�ӳ��
//        $this->Providers        = $voconfig['Providers'];           //����ӳ��

//
//        if(is_array($this->FileReflect)){
//            foreach($this->FileReflect as $key=>$file){
//                $this->ObjectConfig[ucfirst($key)] =  $this->load($file);
//            }
//        }
//        // print_r($this->ObjectConfig);       //������� $this->ObjectConfig

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
    public function make($abstract)
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
        $this->instances[$abstract] = $this->build($abstract);
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
    private function build($abstract)
    {
        $obj_ = $this->Providers[$abstract];
        $obj = new $obj_();
        return $obj;
    }

    /**
     * @return array
     * ���������б�
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
     * �����ĵ�����
     */
    public function document()
    {
        $data = $this->documentData();



        include $this->Baseroot.'Document/Application/Frame.php';
        exit;
    }

    /**
     * @return string
     * �����ĵ����ݽṹ
     */
    public function documentData()
    {

        //Ҫ���ڸ��·���

        //list�б�
        $path = $this->Baseroot.'Document/Application/';

        //��λ��Ҫ�������� 1 lm 2 ar
        $res['lm'] = req('Get')['documentlm'];
        $res['ar'] = req('Get')['documentar'];

        D($_GET);

        //ɨ��������ļ���
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

echo $res['lm'];


        //��ǰ����Ŀ
        if(!empty($res['lm']) and in_array($res['lm'],$list)){     //���� test
            //������Ŀ����''
            echo 'lm';
        }


        //��ǰ������
        if(!empty($res['ar'])){

        }



        D($list);

//            $dirall = scandir($this->storeroot.$this->chr.'/');
//            foreach($dirall as $v){
//                if(strpos($v,'.md'))
//                    $res[] = trim($v,'.md');
//
//            }
//        echo $path;
        exit;












            $res['list'] = $_SERVER['REQUEST_URI'];
        $res['ar'] = $_SERVER['REQUEST_URI'];

    }




}
