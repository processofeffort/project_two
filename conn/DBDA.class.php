<?php
class DBDA
{
    public $host="";   //使用的什么连接，这里是本地连接方式
    public $uid="";  //数据库用户
    public $pwd="";   //用户的密码
    public $dbname="";  //使用的数据库名
     
      //成员方法
    public function Query($sql,$type=1)
    {
        $db = new MySQLi($this->host,$this->uid,$this->pwd,$this->dbname);
        $r = $db->query($sql);
         
        if($type==1)
        {
            return $r->fetch_all();
        }
        else
        {
            return $r;
        }
    }
     
    //返回字符串的方法
    public function StrQuery($sql,$type=1)
    {
        $db = new MySQLi($this->host,$this->uid,$this->pwd,$this->dbname);
        $r = $db->query($sql);
         
        if($type==1)
        {
            $attr = $r->fetch_all();
            $str = "";
            foreach($attr as $v)
            {
                $str .= implode("^",$v)."|";
            }
             
            return substr($str,0,strlen($str)-1);
 
        }
        else
        {
            return $r;
        }
    }
     
    //返回JSON
    function JSONQuery($sql,$type=1)
    {
        $db = mysqli_connect($this->host,$this->uid,$this->pwd,$this->dbname);
		mysqli_query($db,"set names utf8");
        $r = $db->query($sql);
		$d = $r->fetch_all(MYSQLI_ASSOC);
        if($type==1)
        {
            return json_encode($d);
        }
        else
        {
            return $d;
        }
    }
}
?>