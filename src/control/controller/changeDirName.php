<?php
/**
 * Created by PhpStorm.
 * User: xian1
 * Date: 2017/7/14
 * Time: 16:07
 */

include "../../php/connectMysql.php";

$db_table = "myblog";


if (!mysql_select_db($db_table)) {
    echo "连接数据库失败" . mysql_error();
}



$id = $_GET["id"];
$picNewDirName = $_GET['picNewDirName'];
$picOldDirName = $_GET['picOldDirName'];


$res = mysql_query("UPDATE pic_content SET file_url = '$picNewDirName' WHERE picdirid='$id'");


if ($res) {
    echo "success";
}