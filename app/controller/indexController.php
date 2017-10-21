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
        /*$sql = "SELECT * FROM `student`";
        $res = $model->query($sql);
        $data = $res->fetchAll();*/
        $data = array(
            1,2,3,4
        );
        $this->assign('data',$data);
        $this->display('index');
    }
}