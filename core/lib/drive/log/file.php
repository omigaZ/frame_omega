<?php
/**
 * Created by PhpStorm.
 * User: edz
 * Date: 2017/10/21
 * Time: 11:18
 */
namespace core\lib\drive\log;

use core\lib\config;

class file{

    public $path;//日志存储位置
    public function __construct()
    {
        $conf_path = config::get('OPTION','log');
        $this->path = $conf_path['PATH'];
    }

    //文件系统
    public function log($message,$file = 'log'){
        /**
         * 1. 确定文件存储位置是否存在
         *   新建目录
         *
         * 2. 写入日志
         */
        if(!is_dir($this->path.date('YmdH'))){
            mkdir($this->path.date('YmdH'),'0777',true);

        }

        file_put_contents(
            $this->path.date('YmdH').'/'.$file.'.php',
            date('Y-m-d H:i:s').json_encode($message).PHP_EOL,
            FILE_APPEND
        );

    }

}
