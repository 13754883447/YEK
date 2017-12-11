<?php
class code
{
    private $str= 'qwertyuiopasdfghjklzxcvbnm123456789';
    public $width = 120;
    public $height = 40;
    public $lineNum = 5;
    public $dNum = 20;
    private $img;
    private $current="";
    private $type = "png";
    function __construct($url)
    {
        $this->url=$url;
    }

    private function getimg()
    {
        $this->img = imagecreatetruecolor($this->width, $this->height);
    }

    private function getcolor($light = 'l')
    {
        if ($light == 'l') {//亮
            $alpha = mt_rand(10, 60);//透明度随机
            $iamgecolor = imagecolorallocatealpha($this->img, mt_rand(120, 255), mt_rand(120, 255), mt_rand(120, 255), $alpha);//颜色随机
        } else if ($light == 'p') {//暗
            $alpha = mt_rand(60, 110);
            $iamgecolor = imagecolorallocatealpha($this->img, mt_rand(0, 120), mt_rand(0, 120), mt_rand(0, 120), $alpha);
        }
        return   $iamgecolor;//返回值是颜色
    }
    private function imagepng(){
        imagefill($this->img,0,0,$this->getcolor());
    }
    private function imageclose(){
        imagedestroy($this->img);//关闭资源 必须！;
    }
    private function getyuan(){
        for ($i=0;$i<$this->dNum;$i++){//产生点
            imagesetpixel($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),$this->getcolor());//随机产生点
        };
    }
    private function getline(){
        for ($j=0;$j<$this->lineNum;$j++){//随机产生线
            imageline($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$this->getcolor());
        };
    }
    private function length(){
        for($k=0;$k<4;$k++){//验证码长度
            $ran=mt_rand(0,strlen($this->str)-1);//获取随机产生的下标
            $word=substr($this->str,$ran,1);//在随机产生的数组里面截取1个
            $word=mt_rand(0,1)? strtoupper($word):$word;//大小写随机产生
            $this->current.=$word;//放到存储验证码的数组里面
            imagettftext($this->img, mt_rand(25, 30), mt_rand(-20, 20), mt_rand(5, 10) +$k*($this->width / 4), mt_rand(30, 35), $this->getcolor(), $this->url, $word);
        }
        $_SESSION['word']=$this->current;
    }
    public function start(){
        header("content-type:image/png");//图片编码
        session_start();
        $this->getimg();
        $this->imagepng();
        $this->getyuan();
        $this->getline();
        $this->length();
        $name = 'image'.$this->type;
        $name($this->img);
        $this->imageclose();
}
}
$obj=new code("Caprica.ttf");
$obj->start();