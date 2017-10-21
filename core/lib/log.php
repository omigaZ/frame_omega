<?php
/**
 * Created by PhpStorm.
 * User: edz
 * Date: 2017/10/20
 * Time: 17:48
 */
namespace core\lib;
class log{
    static $class;
    /**
     * 1. 确定日志存储方式
     * 2. 写日志
     */

    static public function init(){
        //确定存储方式
        $drive = config::get('DRIVE','log');
        $class = '\core\lib\drive\log\\'.$drive;
        self::$class = new $class;
    }

    static public function log($message,$file = 'log'){
        self::$class->log($message,$file);
    }
}

