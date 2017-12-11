<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/8
 * Time: 13:16
 */
$str=file_get_contents("moban.html");
$preg='/\{lo\s+(\$\w+)\s+(\$\w+)\}([^\{]+)\{(\$\w+)\}([^\{]+)\{\/lo\}/';
$arr=array();
preg_match($preg,$str,$arr);
var_dump($arr);
$result="
<?php
    foreach ($arr[1] as $arr[2]){
        echo '$arr[3]'.$arr[2].'$arr[5]'; 
    }
?>
";
file_put_contents('moban.php',preg_replace($preg,$result,$str));
?>