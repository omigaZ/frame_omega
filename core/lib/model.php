<?php
/**
 * Created by PhpStorm.
 * User: edz
 * Date: 2017/10/19
 * Time: 15:27
 */
namespace core\lib;

class model extends \PDO{
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=test';
        $username = 'root';
        $passwd = '';
        try{
            parent::__construct($dsn, $username, $passwd);
        }catch (\PDOException $e){
            p($e->getMessage());
        }

    }
}