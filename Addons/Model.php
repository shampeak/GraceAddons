<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/29
 * Time: 10:51
 * Class views
 * @package App\Addons
 */
class Model{ // class start
    //调用模型
    public function Run($modelname)
    {
        $modelname = ucfirst(strtolower($modelname));
        $file   = req('addonsRouter')['root']."Model/$modelname"."Model.php";
        $fileEx = req('addonsRouter')['addonsroot']."Model/$modelname"."Model.php";

        if(file_exists($fileEx)){
            include $fileEx;
        }else if(file_exists($file)){
            include $file;
        }

        $model = "\\App\\Addons\\Model\\$modelname"."Model";
        return new $model();
    }


}