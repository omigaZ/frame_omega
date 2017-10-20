<?php
/**
 * Created by PhpStorm.
 * User: edz
 * Date: 2017/10/19
 * Time: 15:27
 */
namespace core\lib;
use core\lib\config;

class model extends \PDO{
    public function __construct()
    {
        $db_connect = config::get_all('db');
        try{
            parent::__construct($db_connect['DSN'], $db_connect['USERNAME'], $db_connect['PASSWD']);
        }catch (\PDOException $e){
            p($e->getMessage());
        }

    }
}