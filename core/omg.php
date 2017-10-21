<?php
/**
 * Created by PhpStorm.
 * User: edz
 * Date: 2017/9/14
 * Time: 18:49
 * 基类
 */
namespace core;
use core\lib\log;
use core\lib\route;

class omg{

    public static $classMap = array();
    public $assign;

    static public function run(){
        log::init();
        log::log('简写测试','aappcc');
        $rote = new route();
        $controllerClass = $rote->ctrl;
        $action = $rote->action;
        $controllerFile = APP.'/controller/'.$controllerClass.'Controller.php';
        $cClass = '\\'.MODULE.'\controller\\'.$controllerClass.'Controller';
        if(is_file($controllerFile)){
            include $controllerFile;
            $control = new $cClass();
            $control->$action();
            log::log('controller: '.$cClass.'---'.'action: '.$action);
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

    public function assign($name,$value){
        $this->assign[$name] = $value;
    }

    public function display($file){
        $file = APP."/view/".$file.".html";
        if(is_file($file)){
            extract($this->assign);
            include $file;
        }
    }
}