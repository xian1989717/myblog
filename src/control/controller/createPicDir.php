<?php
/**
 * Created by PhpStorm.
 * User: xian1
 * Date: 2017/7/12
 * Time: 18:41
 */

include "../../php/connectMysql.php";
include "../../php/PicDirId.php";
$db_table = "myblog";

$picName = $_GET['name'];

echo $picName;

//检查文件夹是否存在
if (!file_exists('../../uploads/' . $picName)) {
    if (!mysql_select_db($db_table)) {
        echo "连接数据库表失败!" . mysqli_error();
    };

    //给数据库添加文件名这个数据
    mysql_query("INSERT INTO pic_content(file_url) VALUES('$picName')");
    //查询数据库file_url一共有多少条记录;
    $num_rows = mysql_num_rows(mysql_query("SELECT DISTINCT file_url FROM pic_content"));
    //数据库和服务器真是文件夹名称
    $dirName = date("YmdHis") . rand(1000, 9999);
    //创建文件夹
    mkdir('../../uploads/' . $dirName);
    //更新数据到数据库,然后把对应文件夹名字也写到数据库
    $picDirId = mysql_query("UPDATE pic_content SET picdirid = '$num_rows' WHERE file_url='$picName' ");
    mysql_query("UPDATE pic_content SET dir_name = '$dirName' WHERE file_url='$picName' ");


    mysql_query("CREATE TABLE `" . $dirName . "` (`id` bigint(1) NOT NULL AUTO_INCREMENT,`time` varchar(50) DEFAULT NULL,`img_title` varchar(50) DEFAULT NULL,`pic_url` varchar(255) DEFAULT NULL,`pic_describe` longtext DEFAULT NULL,`img_parent_folder` varchar(255) DEFAULT NULL,PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;");

    //创建对象,把file_url 和id写到对象里面
    $picDirId = new PicDirId();
    $picDirId->picDir = $picName;
    $picDirId->id = $num_rows;
    //把对象添加到数组中
    $data[] = $picDirId;
    //给前台返回json对象
    echo json_encode($picDirId);
}


