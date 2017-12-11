<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/7
 * Time: 15:08
 */
class father{
    public $name='lisi';
    static function tr(){
        echo "onetwothree";
    }
}
class boy extends father{
    public $name='sd';
    function show(){
//        echo $this->name;
        self::tr().parent::tr();
    }
}
$obj=new boy();
$obj->show();