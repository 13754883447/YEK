<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/7
 * Time: 18:13
 */

class db
{
    private $host='localhost';
    private $user='root';
    private $pass='';
    private $dbname='uek1704';
    private $port='3306';
    public  $table=''; //表名
    private $db='';    //实例化mysqli
    function __construct()
    {
        header('content-type:text/html;charset=utf8');
        $this->db=new mysqli($this->host,$this->user,$this->pass,$this->dbname,$this->port);
        $this->db->set_charset('utf8');
        if($this->db->connect_error){
            echo '连接数据库失败'.$this->db->connect_error;
            exit;
        }
    }
    function selectAll($field="*",$if=""){//$if是条件
        if(empty($if)){
            $sql="select ".$field." from ".$this->table;
        }else{
//            统一格式$if是name=123
            $sql="select ".$field." from ".$this->table." where ".$if;
        }
        $result=$this->db->query($sql);
        $row=$result->fetch_all(MYSQLI_ASSOC);
        return $row;
    }
    function selectOne($field="*",$if=""){
        if(empty($if)){
            $sql="select ".$field." from ".$this->table;
        }else{
//            统一格式$if是name=123
            $sql="select ".$field." from ".$this->table." where ".$if;
        }
        $result=$this->db->query($sql);
        $row=$result->fetch_all(MYSQLI_ASSOC);
        return $row;
    }
    function del($if=""){
        $sql="delete from " .$this->table." where " .$if;
        $this->db->query($sql);
        return $this->db->affected_rows;
    }
    function update($field,$if=""){
        $sql="update ".$this->table ." set ". $field ." where ". $if;
        $this->db->query($sql);
        return $this->db->affected_rows;
    }
    function insert($field){
        $k="";
        $v="";
        foreach ($field as $a=>$b){
            $k.=$a.",";
            $v.="'$b',";
        }
        $k=substr($k,0,strlen($k)-1);//因为后面有一个,所以要截取
        $v=substr($v,0,strlen($v)-1);
        $sql="insert into ".$this->table."(".$k.") values(".$v.")";
        $this->db->query($sql);
        $row=$this->db->affected_rows;
        return $row;
    }
    function close(){
        $this->db->close();
    }
}
$obj=new db();
$obj->table="user";
var_dump($obj->selectAll("*","zhanghao='1'"));
var_dump($obj->del("zhanghao='1'"));
var_dump($obj->update("zhanghao='WYY'","zhanghao='1'"));
var_dump( $obj->insert(array(
    "zhanghao"=>123,
    "pass"=>123,
)));
$obj->close();