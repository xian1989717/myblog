<?php
/**
 * Created by PhpStorm.
 * User: xian1
 * Date: 2017/7/12
 * Time: 20:41
 */

include "../../php/connectMysql.php";
include "../../php/User.php";
include "../../php/PicDirId.php";

$db_table = "myblog";

if (!mysql_select_db($db_table)) {
    echo "连接数据库失败!" . mysql_error();
}

$query = mysql_query(" SELECT distinct * from pic_content");


while ($row = mysql_fetch_assoc($query)) {
    $picDirId = new PicDirId();
    $picDirId->picDir = $row['file_url'];
    $picDirId->id = $row['picdirid'];
    $data[] = $picDirId;
};

if (!@count($data) == 0) {
    echo json_encode($data);
}


