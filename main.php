<?php
session_start();
if(isset($_GET['id']))
{
      $id=intval($_GET['id']);
}
else
{
		  $id=0;
}
   
//$id=0;
//echo $_SESSION['name'];
function group_name($index)
     {
     	switch ($index) {
			case 1:
			  $temp='CEO交流群';
				break;
			case 2:
			  $temp='产品经理交流群';
			 break;
			case 3:
			  $temp='码农交流群';
				break;
			case 4:
			  $temp='傻逼的需求交流群';
			  break;

		}
		return $temp;
     }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<script type="text/javascript" charset="utf-8" >
//js解析url传值
function request(paras) 
{
            var url = location.href;
            var paraString = url.substring(url.indexOf("?") + 1, url.length).split("&");
            var paraObj = { };
            for (i = 0; j = paraString[i]; i++) {
                paraObj[j.substring(0, j.indexOf("=")).toLowerCase()] = j.substring(j.indexOf("=") + 1, j.length);
            }
            var returnValue = paraObj[paras.toLowerCase()];
            if (typeof (returnValue) == "undefined") {
                return "";
            } else {
                return returnValue;
            }
}




function loadshow()
{
 // alert("come indexOf");
var xmlhttp;
var idd = decodeURI(request("id"));

if (idd=="") {idd=0};//alert(idd);//De=‘未设置’
//建立XMLHttpRequest,用于和服务器通信
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
var url="show.php?id=" +idd;
url=url+"&sid="+Math.random();
//alert(url);
xmlhttp.open("GET",url,true);
xmlhttp.send();
xmlhttp.onreadystatechange=function()
{
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("show").innerHTML=xmlhttp.responseText;
    }
}
}
function loadme()
{
var xmlhttp;
var content=document.getElementById("content");
var idd = decodeURI(request("id"));

if (idd=="") {idd=0}//alert(idd);//De=‘未设置’
//建立XMLHttpRequest,用于和服务器通信
if (content.value=="")
{
    alert("评论不能为空！");
    content.focus();
    return;
}
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }


var url="edit.php?content=" +content.value;
url=url+"&id="+idd;
url=url+"&sid="+Math.random();
xmlhttp.open("GET",url,true);
xmlhttp.send();
alert(url);
xmlhttp.onreadystatechange=function()
{alert("进入");
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    alert("开始Ajax");
    document.getElementById("show").innerHTML=document.getElementById("show").innerHTML+xmlhttp.responseText;
    }
    else
    {
    	alert("评论失败！请稍后重试");
    }
}
document.getElementById("content").innerHTML="";
}

</script> 
<style type="text/css">
body{margin: 0 0 0 0;}
#show{width: 80%;height:393px;top:50px;padding-top:0;left: 20%;position:absolute;overflow:scroll;}
#list{width: 20%;height:593px;top:50px;padding-top:0;left:0;position:absolute;}
#edit{width: 80%;height:200px;top:443px;padding-top:0;left: 20%;position:absolute;}
#title{width: 100%;height:50px;top: 0px;padding-top:0;left: 0;position:absolute;}
</style>
<title>chat</title>


</head>
<body>
<div id="title">当前聊天群组为<?php echo group_name($_SESSION['group'][$id])?> 当前用户:<?php echo $_SESSION['name']?><a href="logout.php">退出</a></div>
<div id="list">
<dl>
	<?php 
	for ($i=0; $i <$_SESSION['len']; $i++) { 
		$tmp=group_name($_SESSION['group'][$i]);
		echo '<dd><a href="main.php?id='.$i.'">'.$tmp."</a></dd>";
	}
	?>
</dl>
</div>
<div id="show">
	<script type="text/javascript">
	setInterval("loadshow()",10);
   </script>
</div>
<div id="edit">
	<textarea rows="9" cols="100" id="content"></textarea><br>
    <input type="button" value="发送" onclick="loadme()">   <input type="reset" value="撤销">
</div>
</body>
</html>