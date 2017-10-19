<?php
/**
 * Created by PhpStorm.
 * User: edz
 * Date: 2017/9/15
 * Time: 14:22
 */
namespace app\controller;
use core\lib\model;
use core\omg;

class indexController extends omg {

    public function index(){
        $model = new model();
        $sql = "SELECT * FROM `student`";
        $res = $model->query($sql);
        $data = $res->fetchAll();
        $this->assign('data',$data);
        $this->display('index');
    }
}