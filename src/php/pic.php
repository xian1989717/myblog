<?php
/**
 * Created by PhpStorm.
 * User: xian1
 * Date: 2017/7/26
 * Time: 14:36
 */

include "connectMysql.php";
include "picContent.php";
$db_table = "myblog";
if (!mysql_select_db("$db_table")) {
    echo "连接表失败!" . mysql_error();
}


$res = mysql_query("SELECT * FROM pic_content");


while ($row = mysql_fetch_assoc($res)) {
    $picContent = new picContent();
    $picContent->fileUrl = $row['file_url'];
    $picContent->dirName = $row['dir_name'];
    $arr[] = $picContent;
}


echo json_encode(array('pic' => $arr));