<?php
/**
 * Created by PhpStorm.
 * User: edz
 * Date: 2017/9/11
 * Time: 11:30
 */
define('OMG',realpath('./'));
define('CORE',OMG.'/core');
define('APP',OMG.'/app');
define('MODULE','app');
define('DEBUG',true);

if(DEBUG){
    ini_set('display_errors','on');
}else{
    ini_set('display_errors','off');
}

include CORE.'/common/function.php';

include CORE.'/omg.php';

//类自动加载（new一个不存在的类，自动触发该方法加载类）
spl_autoload_register('\core\omg::load');

\core\omg::run();