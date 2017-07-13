<?php
/**
 * Created by PhpStorm.
 * User: xian1
 * Date: 2017/7/12
 * Time: 18:41
 */

include "../../php/connectMysql.php";

$db_table = "myblog";

$picName = $_GET['name'];
//检查文件夹是否存在
if (!file_exists('../../uploads/' . $picName)) {
    if (!mysql_select_db($db_table)) {
        echo "连接数据库表失败!" . mysqli_error();
    };
    //创建文件夹
    mkdir('../../uploads/' . $picName);
    mysql_query("INSERT INTO pic_content(file_url) VALUES('$picName')");
    echo $picName;
}


