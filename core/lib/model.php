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

    public function getOne($id){
        return $this->get($this->table,'*',array('id'=>$id));
    }

    public function setOne($id,$data){
        return $this->update($this->table,$data,array('id'=>$id))->rowCount();
    }

    public function delOne($id){
        return $this->delete($this->table,array('id'=>$id))->rowCount();
    }

}