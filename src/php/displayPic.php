<?php
/**
 * Created by PhpStorm.
 * User: xian1
 * Date: 2017/7/26
 * Time: 17:12
 */

include "connectMysql.php";
include "picContent.php";

$db_table = "myblog";
if (!mysql_select_db("$db_table")) {
    echo "连接表失败!" . mysql_error();
}

$parms = $_GET['picDirName'];


$res = mysql_query("SELECT * FROM `$parms`");


while ($row = mysql_fetch_assoc($res)) {
    $user = new picContent();
    $user->time = $row['time'];
    $user->picUrl = $row['pic_url'];
    $user->picDescribe = $row['pic_describe'];
    $user->picTitle = $row['img_title'];
    $arr[] = $user;
}


echo json_encode(array("user" => $arr));






















