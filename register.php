<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>注册用户</title>
</head>
<body>
	<center>
    <form  action="chat.php" method="POST">
       昵称：<input type="text" name="name"><br>
       密码：<input type="password" name="password"><br>
       你想要加入的群组:<br>
   <table>
   	<tr>
   		<td><input type="checkbox"  name="group[]" value="1"/>CEO交流群</td> 
        <td><input type="checkbox"  name="group[]" value="2"/>产品经理交流群</td> 
   	</tr>
    <tr>
   		<td><input type="checkbox"  name="group[]" value="3"/>码农交流群</td> 
        <td><input type="checkbox"  name="group[]" value="4"/>傻逼的需求交流群</td> 
   	</tr>
   </table>
   <input type="submit" value="注册">
    </form>
  </center>
</body>
</html>