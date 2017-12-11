<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/7
 * Time: 17:32
 */

class controller
{
    function setview()
    {
        include_once 'model.php';
        $model=new model();
        $result=$model->senddata();
        include_once 'view.php';
        $view=new getview();
        $view->getview($result);
    }
}