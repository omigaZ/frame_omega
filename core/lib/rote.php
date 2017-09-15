<?php
/**
 * Created by PhpStorm.
 * User: edz
 * Date: 2017/9/14
 * Time: 19:05
 */
namespace core\lib;
class rote{
    public $ctrl;
    public $action;
    public function __construct()
    {
        /**
         * 1,隐藏index.php
         * 2,获取URL 参数部分
         * 3,返回对应控制器和方法
         */
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
            $path = $_SERVER['REQUEST_URI'];
            $pathAry = explode('/',trim($path,'/'));
           if(isset($pathAry[0])){
               $this->ctrl = $pathAry[0];
               unset($pathAry[0]);
           }

           if(isset($pathAry[1])){
               $this->action = $pathAry[1];
               unset($pathAry[1]);
           }else{
               $this->action = 'index';
           }
           //解析参数
            $count = count($pathAry);
           $i = 2;
           while($i <$count){
               if(isset($pathAry[$i+1])){
                    $_GET[$pathAry[$i]] = $pathAry[$i+1];
               }
               $i += 2;
           }
           p($_GET);
        }else{
            $this->ctrl = 'index';
            $this->action = 'index';
        }
    }
}