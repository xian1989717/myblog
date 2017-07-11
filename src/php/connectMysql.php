<?php
$db_name = "localhost";
$db_user = "root";
$db_pwd = "root";
mysql_query("set myblog utf8");
$link = mysql_connect($db_name, $db_user, $db_pwd);

if (!$link) {
    echo "连接数据库失败!!!!!" . mysql_error();
    exit();
}
