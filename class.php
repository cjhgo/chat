<?php
header("Content-Type: text/html; charset=utf-8");
include 'config.php';
class user{
	public  $name,$password,$groupp,$id;
	private $link;
    function __construct()
    {
        @ $this->link= mysql_connect(WEB_SERVER, WEB_USER, WEB_PWD);
         mysql_select_db(WEB_DB);
         mysql_query('set names utf8');
         if (mysqli_connect_errno()) {
         echo '无法连接数据库，稍后重试';
         exit;
         }
    }
    function __destruct()
    {
    	mysql_close($this->link);
    }
    function submit()
    {
        $query = "insert into user values
        ('".$this->name."', '".$this->password."','".$this->groupp."')"; 
      $result = mysql_query($query);
      if ($result)
        return 1;
      else
        return 0;
    }
};
class chat{
    public $name,$groupp,$content,$time,$nums;
    private $link;
    function __construct()
    {
        @ $this->link= mysql_connect(WEB_SERVER, WEB_USER, WEB_PWD);
         mysql_select_db(WEB_DB);
         mysql_query('set names utf8');
         if (mysqli_connect_errno()) {
         echo '无法连接数据库，稍后重试';
         exit;
         }
    }
    function __destruct()
    {
        mysql_close($this->link);
    }
    function submit()
    {
    $query = "insert into chat values
    ('".$this->name."', '".$this->content."','".$this->groupp."','".$this->time."')"; 
    $result = mysql_query($query);
      if ($result)
        return 1;
      else
        return 0;
    }
    function show()
    { 
      $query="select * from chat where groupp = '$this->groupp' limit 0,20;";
      $result = mysql_query($query);
      //echo $query; 
     // echo $result;
      $nums = mysql_num_rows($result);  
      if ($nums ==0) {
      echo "还没人聊天呢，快留下你的第一句话吧！";
     } else {
     for ($i=0; $i<=$nums; $i++) {
        $row = mysql_fetch_assoc($result);
        //echo $i."楼<br>";
        echo $row['name']."<br>";
        echo htmlspecialchars(stripslashes($row['content']))."<br>";
        echo $row['time']."<br>";
          
      } 
    }

    }
}
?>