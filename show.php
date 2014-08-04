<?php

   session_start();
   //echo "<script>alert('come in show')</script>";
   header("Content-Type: text/html; charset=utf-8");
   if(isset($_GET['id']))
   {
      $id=intval($_GET['id']);
	  }
	  else
    {
		  $id=0;
    }
 // echo $id;
   include 'class.php';
   $show=new chat();
   $show->groupp=$_SESSION['group'][$id];
  // echo "<script>alert(".gettype($show->group).")</script>";
   $show->show();
?>