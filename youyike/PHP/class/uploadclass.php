<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/6
 * Time: 20:34
 */
class upload{
    public $path = "upload";
    private $file;
    public $size = 20 * 1024 * 1024;
    public $types = array("jpeg", "png", "gif");
    function __construct($name)
    {
        date_default_timezone_set("Asia/shanghai");//默认时区
        $this->file = $_FILES[$name];//文件名字
    }
    function upload(){
        array_walk($this->file["size"], function ($val, $item){//array_walk() 函数对数组中的每个元素应用回调函数。如果成功则返回 TRUE，否则返回 FALSE。
            if ($val > $this->size) {
                echo "文件过大";
                exit;
            }
            $type = explode("/", $this->file["type"][$item])[1];//格式
            if (!in_array($type, $this->types)) {//检查格式
                echo "文件格式不支持";
                exit;
            }
            $name = time() . $item . "." . $type;//文件创建的名字
            $date = date("y-m-d");//文件创建的时间
            if (!is_dir($this->path)) {//如果没有就创建该文件夹
                mkdir($this->path);
            }
            if (!is_dir($this->path . "/" . $date)) {//子集文件夹
                mkdir($this->path . "/" . $date);
            }
            if (is_uploaded_file($this->file["tmp_name"][$item])) {//is_uploaded_file() 函数判断指定的文件是否是通过 HTTP POST 上传的。检查
                $reslt = move_uploaded_file($this->file["tmp_name"][$item], $this->path . "/" . $date . "/" . $name);//move_uploaded_file() 函数将上传的文件移动到新位置。若成功，则返回 true，否则返回 false。
                if ($reslt) {
                    echo "上传成功";
                } else {
                    echo "上传失败";
                }
            }
        });
    }
}
$obj=new upload("file");//name是html表单file的名字
$obj->upload();