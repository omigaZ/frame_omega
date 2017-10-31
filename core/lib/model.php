<?php
/**
 * Created by PhpStorm.
 * User: edz
 * Date: 2017/10/19
 * Time: 15:27
 */
namespace core\lib;
use core\lib\config;

class model extends \Medoo\Medoo{
    protected $table;
    public function __construct()
    {
        $db_option = config::get_all('db');
        parent::__construct($db_option);
    }

    public function lists(){
        $res = $this->select($this->table,'*');
        return $res;
    }

}