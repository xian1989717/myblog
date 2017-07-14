<?php
/**
 * Created by PhpStorm.
 * User: xian1
 * Date: 2017/7/13
 * Time: 17:40
 */

include "../../php/connectMysql.php";

$db_table = "myblog";


if (!mysql_select_db($db_table)) {
    echo "连接数据表失败" . mysql_error();
}


$picDirId = $_GET['picDirId'];
$dirName = $_GET['picName'];


$picDir = rmdir("../../uploads/" . $dirName);
$databaseDir = mysql_query("DELETE FROM pic_content where picdirid='$picDirId'");

if ($picDir && $databaseDir) {
    echo "success";
}