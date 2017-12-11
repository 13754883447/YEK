<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/8
 * Time: 14:59
 */
include "smarty/Smarty.class.php";
$smarty=new Smarty();//实例化
$smarty->setCompileDir('compile');//写到
$smarty->setTemplateDir('html');//读取
$smarty->assign("name","李四");//值
$smarty->display('smarty.html');//展示