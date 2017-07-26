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
$fileUrl = $_GET['picName'];


$name = mysql_fetch_assoc(mysql_query("SELECT * FROM pic_content WHERE file_url='$fileUrl' "));
$dirName = $name['dir_name'];


//删除服务器文件夹
$picDir = "../../uploads/" . $dirName;


$res = deldir($picDir);


//删除pic_content里面对应的数据
$databaseDir = mysql_query("DELETE FROM pic_content where picdirid='$picDirId'");
//删除对应的数据库表
$delTable = mysql_query("DROP TABLE `" . $dirName . "`");

if ($res && $databaseDir && $delTable) {
    echo "success";
}


function deldir($dir)
{
    //先删除目录下的文件：
    $dh = opendir($dir);
    while ($file = readdir($dh)) {
        if ($file != "." && $file != "..") {
            $fullpath = $dir . "/" . $file;
            if (!is_dir($fullpath)) {
                unlink($fullpath);
            } else {
                deldir($fullpath);
            }
        }
    }
    closedir($dh);
    //删除当前文件夹：
    if (rmdir($dir)) {
        return true;
    } else {
        return false;
    }
}