<?php
session_start();
include 'class.php';
$user_reg=new user();
$user_reg->name=$_POST['name'];
$user_reg->password=$_POST['password'];
$user_reg->group=$_POST['group'];
$user_reg->group=implode(",", $user_reg->group);//将复选框数组合并为字符串，便于存入数据库。
$judge=$user_reg->submit();//$judge用来判断是否插入数据库成功
if ($judge==0) {
	echo '<script>alert("注册失败，请返回重试");';
	echo "window.location.href='register.php';</script>";
} else {
	$_SESSION['name']=$user_reg->name;
	$_SESSION['group']=$_POST['group'];
	echo $_SESSION['name'];
	//echo $session['group'][0];
	//echo $_session['group'][1];
	$_SESSION['len']=count($_SESSION['group']);
	//$_SESSION['id']=0;
	//echo $_SESSION['id'];
}  
?>
<html>
<body>
<a href="main.php">main</a></body>
</html>