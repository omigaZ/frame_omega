<?php
/**
 * Created by PhpStorm.
 * User: edz
 * Date: 2017/10/31
 * Time: 11:34
 */
namespace app\model;

use core\lib\model;

class studentModel extends model{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'student';
    }

    public function getOne($id){
        return $this->get($this->table,'*',array(
            'id'=>$id
        ));
    }

}