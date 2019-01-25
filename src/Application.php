<?php
/**
 * 深圳市易知互联网科技有限公司
 * User: pengjian(szpengjian@gmail.com)
 * Date: 19-1-25
 * Time: 下午5:41
 */
namespace Wtdl\Framework;

class Application{


    public function __construct()
    {
        if ($_SERVER['REQUEST_URI'] != '/'){
            if (strpos($_SERVER['REQUEST_URI'],'index.php')){
                $pathinfo = explode('/',trim($_SERVER['REQUEST_URI'],'/'));
                unset($pathinfo[0]);
                if (count($pathinfo)>2){
                    $Controller = dirname(dirname(dirname(__DIR__))).DIRECTORY_SEPARATOR."app/Controllers".DIRECTORY_SEPARATOR.ucfirst($pathinfo['1']).DIRECTORY_SEPARATOR.ucfirst($pathinfo[2])."Controller";
                }else{
                    $Controller = dirname(dirname(dirname(__DIR__))).DIRECTORY_SEPARATOR."app/Controllers".DIRECTORY_SEPARATOR.ucfirst('home').DIRECTORY_SEPARATOR.ucfirst($pathinfo[1])."Controller";
                }

                print_r($Controller);

                echo "<pre>";
                print_r($pathinfo);
                exit();
            }
            echo "<pre>";
            print_r(explode('/',$_SERVER['REQUEST_URI']));
            die();
        }
        echo "dd";
    }

}