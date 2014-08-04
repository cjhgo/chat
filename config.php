<?php
/*
+-----------------------------------------------------------------------
|	文件概要：网站配置文件
|	文件名称：config.php
+-----------------------------------------------------------------------
*/
#define('WEB_TITLE','Simple Board - 简易留言板1.0');	#留言板名称
define('WEB_SERVER','localhost');	#数据库服务器
define('WEB_USER','root');	#数据库用户名
define('WEB_PWD','root');	#数据库密码
define('WEB_DB','oo');	#数据库名称
//define('WEB_TABLE', 'board');
#define('WEB_dbprefix','sb_');	#数据表前缀
define('WEB_PAGE',10);	#每页显示留言数量
?>