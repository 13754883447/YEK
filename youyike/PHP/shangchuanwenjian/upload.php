<?php
header("content-Type:text/html;charset:utf-8");
date_default_timezone_set("Asia/Shanghai");//创建时间
$file=$_FILES['file'];
    $type=explode('/',$file['type'])[1];
    $path="uploadfile";
    if(!is_dir($path)){//检测是否有这个路径
        mkdir($path);//创建路径
    }
    $date=date("y-m-d");//指17-07-26//文件夹名字
    if(!is_dir($path.'/'.$date)){
        mkdir($path.'/'.$date);
    }
    $name=microtime(true).".".$type;//文件的新的一个名字
    if(is_uploaded_file($file['tmp_name'])){//图片的名字
        $result=move_uploaded_file($file['tmp_name'],$path."/".$date."/".$name);//图片路径
        if($result){
            echo "上传成功";
        }else{
            echo "上传失败";
        }
}
?>