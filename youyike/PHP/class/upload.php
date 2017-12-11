<?php

/**
 * Created by PhpStorm.
 * User: 胡玉君
 * Date: 2017/8/5
 * Time: 17:39
 */
class upload
{
    public $path = "upload";
    private $file;
    public $size = 20 * 1024 * 1024;
    public $types = array("jpeg", "png", "gif");

    function __construct($name)
    {
        date_default_timezone_set("Asia/shanghai");
        $this->file = $_FILES[$name];
    }


    function upload_file()
    {
        array_walk($this->file["size"], function ($val, $item) {
            if ($val > $this->size) {
                echo "文件过大";
                exit;
            }
            $type = explode("/", $this->file["type"][$item])[1];
            if (!in_array($type, $this->types)) {
                echo "文件格式不支持";
                exit;
            }
            $name = time() . $item . "." . $type;
            $date = date("Ymd");
            if (!is_dir($this->path)) {
                mkdir($this->path);
            }
            if (!is_dir($this->path . "/" . $date)) {
                mkdir($this->path . "/" . $date);
            }
            if (is_uploaded_file($this->file["tmp_name"][$item])) {
                $reslt = move_uploaded_file($this->file["tmp_name"][$item], $this->path . "/" . $date . "/" . $name);
                if ($reslt) {
                    echo "上传成功";
                } else {
                    echo "上传失败";
                }
            }

        });
    }
}
var_dump($_FILES);
$obj=new upload("file");
$obj->upload_file();