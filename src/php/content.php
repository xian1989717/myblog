<?php
include "connectMysql.php";
$db_table = "myblog";
if (!mysql_select_db("$db_table")) {
    echo "连接表失败!" . mysql_error();
}
$id = $_GET['id'];
$type = $_GET['type'];

mysql_query("update details set click_rate=click_rate+1 where id = $id");//让点击率+1

$res = mysql_query("SELECT * FROM details where id = $id");
$row = mysql_fetch_assoc($res);
if ($type == 2) {
    $typeConnect = "技术分享";
} else {
    $typeConnect = "个人日志";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/content.css">
    <link rel="stylesheet" href="../css/base.css">
</head>
<body>
<header class="headerImg clearfix">
    <div></div>
    <ul>
        <li><a href="../../index.php">首页</a></li>
        <li><a href="../../index.php?id=<?php echo $type ?>"><?php echo $typeConnect ?></a></li>
    </ul>
</header>
<main class="ban_xin">
    <div>
        <header>
            <h1><?php echo $row['headline'] ?></h1>
        </header>
        <p class="title">
            <span>作者:&nbsp;<?php echo $row['author'] ?></span>
            <span>点击率:&nbsp;<?php echo $row['click_rate'] ?></span>
            <span>发布时间:&nbsp;<?php echo $row['time'] ?></span>
        </p>
        <hr>
        <div class="content">
            <?php echo $row['content'] ?>
        </div>
    </div>
</main>
<div class="anchor"><a href="#">返回顶部</a></div>
<div style="width: 100%;height: 50px;"></div>
</body>
</html>