<?php
/**
 * Created by PhpStorm.
 * User: edz
 * Date: 2017/9/15
 * Time: 14:22
 */
namespace app\controller;
use app\model\studentModel;
use core\omg;

class indexController extends omg {

    public function index(){
        $model = new studentModel();

        $student_one = $model->getOne(1);

        dump($student_one);
    }
}