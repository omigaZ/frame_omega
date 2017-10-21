<?php
/**
 * Created by PhpStorm.
 * User: edz
 * Date: 2017/10/21
 * Time: 11:19
 */
//数据库中
namespace core\lib\drive\log;
use core\lib\model;

class mysql{
    //文件系统
    public $model;


    public function log($message,$file){
        /**
         *
         *  连接数据库，查看my_log表是否存在
         *     不存在则创建数据表my_log
         *
         *  数据写入数据库的my_log表中
         */

        //TODO    被调用两次
        $this->model = new model();
        $sql = "CREATE TABLE IF NOT EXISTS 
                    my_log (
                      id INT(11) NOT NULL auto_increment,
                      msg VARCHAR(500) DEFAULT '',
                      create_time INT(11) DEFAULT 0,
                      PRIMARY KEY (id)  
                    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8; ";

        $c_time = time();
        //INSERT INTO `test`.`my_log` (`id`, `msg`, `create_time`) VALUES (NULL, 'ceshi1', '1885544775');
        $sql .= " INSERT INTO my_log (msg,create_time) VALUES ('".$message."','".$c_time."');";
        $this->model->query($sql);
    }

}
