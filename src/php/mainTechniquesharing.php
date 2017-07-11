<?php
include "connectMysql.php";
include "User.php";

$db_table = "myblog";

if (!mysql_select_db("$db_table")) {
    echo "连接表失败!" . mysql_error();
    exit();
};
$res = mysql_query("SELECT * FROM details where text_type='technique_sharing' limit 0,3");
while ($row = mysql_fetch_assoc($res)) {
    $user = new User();
    $user->titleImg = $row['title_img'];
    $user->headline = $row['headline'];
    $user->clickRate = $row['click_rate'];
    $user->author = $row['author'];
    $user->content = $row['content'];
    $user->time = $row['time'];
    $user->label = $row['label'];
    $user->id = $row['id'];
    $data[] = $user;
};
echo json_encode(array('user' => $data));

