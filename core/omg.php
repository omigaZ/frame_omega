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
        //log::log('简写测试','aappcc');
        //实例化路由类，隐藏index.php以及拆分controller和action
        $rote = new route();
        $controllerClass = $rote->ctrl;
        $action = $rote->action;
        //根据连接里的controller拼接文件位置，查找该文件是否存在
        $controllerFile = APP.'/controller/'.$controllerClass.'Controller.php';
        $cClass = '\\'.MODULE.'\controller\\'.$controllerClass.'Controller';
        if(is_file($controllerFile)){
            //存在则引入改controller
            include $controllerFile;
            //实例化当前的controller
            $control = new $cClass();
            //调用controller里的函数
            $control->$action();
            log::log('controller: '.$cClass.'---'.'action: '.$action);
        }else{
            //否则抛出异常
            throw new \Exception('找不到控制器'.$controllerClass);
        }
    }

    /**
     * 实现类的自动加载
     * @param $class
     * @return bool
     */
    static public function load($class){
        //判断类是否已经存入全局变量中（即是否已经加载）
        if(isset($classMap[$class])){
            return true;
        }else{
            //没有加载则开始拼接类的路径
            $class = str_replace('\\','/',$class);
            //判断该路径是否存在
            $file = OMG.'/'.$class.'.php';
            if(is_file($file)){
                //存在则引入
                include $file;
                //同时将类存入全局变量数组中
                self::$classMap[$class] = $class;
            }else{
                //否则直接报错
                return false;
            }
        }

    }

    /**
     * 委派变量到页面
     * @param $name
     * @param $value
     */
    public function assign($name,$value){
        //利用全局变量将键值引入页面
        $this->assign[$name] = $value;
    }

    /**
     * display方法
     * 加载相应页面
     * @param $file
     */
    public function display($file){
        //拼接html文件路径
        $file_all = APP."/view/".$file.".html";
        //判断该路径是否存在
        if(is_file($file_all)){
            //extract($this->assign);
            //存在则引入文件    利用composer引入的插件进行页面渲染
            require_once OMG.'/vendor/autoload.php';
            $loader = new \Twig_Loader_Filesystem(APP.'/view');
            $twig = new \Twig_Environment($loader, array(
                'cache' => OMG.'/log/twig',
                'debug'=>DEBUG
            ));
            $template = $twig->load($file.'.html');
            $template->display($this->assign?$this->assign:array());
        }
    }
}