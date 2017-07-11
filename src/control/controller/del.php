<?php
include "../../php/connectMysql.php";

$db_table = "myblog";

if (!mysql_select_db($db_table)) {
    echo "连接数据表出错!" . mysql_error();
}

$id = $_GET['id'];

//下面就就把要删除的文章对应的图片也一并删除
$pic = mysql_query("SELECT * FROM details where id = $id");
$picUrl = mysql_fetch_assoc($pic);
echo $res = str_replace("http://www.blogs.com/src/", "../../", $picUrl['title_img']);
if (unlink($res)) {
    $res = mysql_query("DELETE FROM details where id=$id");
    if ($res) {
        header("location:../AllContent.php");
    }
}



