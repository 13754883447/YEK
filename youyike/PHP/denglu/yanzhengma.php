<?php
//header("content-type:text/html;charset:utf-8");
header("content-type:image/png");//图片编码
session_start();//开启session
$width=120;//宽高
$height=40;
$img=imagecreatetruecolor($width,$height);//创建背景
imagefill($img,0,0,getcolor($img,'p'));//填充色
for ($i=0;$i<20;$i++){//产生点
    imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),getcolor($img,"l"));//随机产生点
};
for ($j=0;$j<5;$j++){//随机产生线
    imageline($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),getcolor($img));
};
$current="";//创建用来存储验证码的
$str="0132456789qwertyuiopasdfghjklzxcvbhnm";//字符串随机产生的数组
for($k=0;$k<4;$k++){//验证码长度
    $ran=mt_rand(0,strlen($str)-1);//获取随机产生的下标
    $word=substr($str,$ran,1);//在随机产生的数组里面截取1个
    $word=mt_rand(0,1)? strtoupper($word):$word;//大小写随机产生
    $current.=$word;//放到存储验证码的数组里面
    imagettftext($img,mt_rand(25,30),mt_rand(-20,20),mt_rand(5,10)+$k*30,mt_rand(25,35),getcolor($img),"ARCENA.ttf",$word);//出现的图片,位置,颜色,字体样式,什么字
}
$_SESSION["word"]=$current;//用session 存储到本地
imagepng($img);//输出图片
imagedestroy($img);//关闭资源 必须！;
function getcolor($img,$light='l'){//随机产生颜色的函数 封装
    if($light=='l'){//亮
        $alpha=mt_rand(10,60);//透明度随机
        $color2=imagecolorallocatealpha($img,mt_rand(120,255),mt_rand(120,255),mt_rand(120,255),$alpha);//颜色随机
    }elseif ($light=='p'){//暗
        $alpha=mt_rand(60,110);
        $color2=imagecolorallocatealpha($img,mt_rand(0,120),mt_rand(0,120),mt_rand(0,120),$alpha);
    }
    return   $color2;//返回值是颜色
}
?>