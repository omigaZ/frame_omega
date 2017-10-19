<?php
namespace core\lib;

class  config{
    static public $config = array();
    static public function get($name,$file){
        /**
         * 1 判断配置文件是否存在
         * 2 判断配置是否存在
         * 3 缓存配置
         */
        $file = OMG.'\core\config\\'.$file.'.php';
        if(is_file($file)){
            $conf = include $file;
            if(isset($conf[$name])){
                self::$config[$file] = $conf;
                return $conf[$name];
            }else{
                throw new \Exception('配置项'.$name.'不存在');
            }
        }else{
            throw new \Exception('配置文件'.$file.'不存在');
        }
    }
}