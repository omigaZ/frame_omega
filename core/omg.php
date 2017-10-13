<?php
/**
 * Created by PhpStorm.
 * User: edz
 * Date: 2017/9/14
 * Time: 18:49
 * 基类
 */
namespace core;
class omg{

    public static $classMap = array();

    static public function run(){
        $rote = new \core\lib\rote();
        $controllerClass = $rote->ctrl;
        $action = $rote->action;
        $controllerFile = APP.'/controller/'.$controllerClass.'Controller.php';
        $cClass = '\\'.MODULE.'\controller\\'.$controllerClass.'Controller';
        if(is_file($controllerFile)){
            include $controllerFile;
            $control = new $cClass();
            $control->$action();
        }else{
            throw new \Exception('找不到控制器'.$controllerClass);
        }
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