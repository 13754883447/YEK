<?php
/**
 * Created by PhpStorm.
 * User: 凯瑟琳
 * Date: 2017/8/6
 * Time: 20:39
 */
class MySql{
    private $db="";
    function __construct($user,$password,$tables)
    {
        header("content-type:text/html;charset=utf8");
        $this->db=new mysqli("localhost",$user,$password,$tables);
        if ($this->db->connect_error){
            echo "链接失败".$this->db->connect_error;
            exit;
        }
        $this->db->query("set names utf8");
    }
    function select($sql){
        $result=$this->db->query($sql);
        $arr=array();
            if ($result&&$result->num_rows>0){
                while ($row=$result->fetch_assoc()){
                    $arr[]=$row;
                }
            }
            return $arr;
    }
    function insert($sql){
        $result=$this->db->query($sql);
        if ($this->db->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }
    function update($sql){
        $result=$this->db->query($sql);
        if ($this->db->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }
    function delete($sql){
        $result=$this->db->query($sql);
        if ($this->db->affected_rows>0){
            return true;
        }else{
            return false;
        }
    }
}
$obj=new MySql("root","","uek1704");
var_dump($obj->select("select * from category"));
$obj->insert("insert into content(pos_name) VALUES('首页4')");
var_dump($obj->insert("insert into content(pos_name) VALUES('首页4')"));
?>