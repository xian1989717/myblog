<?php
/**
 * Created by PhpStorm.
 * User: xian1
 * Date: 2017/7/12
 * Time: 20:41
 */

include "../../php/connectMysql.php";
include "../../php/User.php";

$db_table = "myblog";

if (!mysql_select_db($db_table)) {
    echo "连接数据库失败!" . mysql_error();
}

$res = mysql_query(" SELECT distinct file_url from pic_content");


while ($row = mysql_fetch_assoc($res)) {

    $data[] = $row['file_url'];

};
echo json_encode($data);


