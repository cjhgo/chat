<?php
   session_start();
   header("Content-Type: text/html; charset=utf-8");
   $timezone = "PRC";//将时间区间定为中国大陆
 if(function_exists('date_default_timezone_set')){
    date_default_timezone_set($timezone);
 }
   if(isset($_GET['id'])){
      $id=intval($_GET['id']);
	  }
	  else{
		  $id=0;
     }
   include 'class.php';
   $edit=new chat();
   $edit->groupp=$_SESSION['group'][$id];
   $content=$_GET['content'];
   $t=time();
  $time=Date("Y-m-j H:i:s",$t);
  if (!get_magic_quotes_gpc()) {
           $content= addslashes($content);
 }
 $edit->content=$content;
 $edit->time=$time;
 $edit->name=$_SESSION['name'];
 $edit->submit();
 echo $edit->name."<br>";
 echo htmlspecialchars(stripslashes($edit->content))."<br>";
 echo $edit->time."<br>";
?>