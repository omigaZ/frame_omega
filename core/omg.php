<?php
/**
 * Created by PhpStorm.
 * User: edz
 * Date: 2017/9/14
 * Time: 18:49
 */
namespace core;
class omg{

    public static $classMap = array();

    static public function run(){
        p('OK');
        $rote = new \core\lib\rote();
        p($rote);
    }

    /**
     * 实现类的自动加载
     * @param $class
     * @return bool
     */
    static public function load($class){
        if(isset($classMap[$class])){
            return true;
        }else{
            $class = str_replace('\\','/',$class);
            $file = OMG.'/'.$class.'.php';
            if(is_file($file)){
                include $file;
                self::$classMap[$class] = $class;
            }else{
                return false;
            }
        }

    }
}