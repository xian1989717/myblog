<?php
/**
 * Created by PhpStorm.
 * User: xian1
 * Date: 2017/7/6
 * Time: 18:04
 */
include "../../php/connectMysql.php";

$db_table = "myblog";

if (!mysql_select_db("$db_table")) {
    echo "连接表失败!" . mysql_error();
}


$id = $_GET['id'];

$res = mysql_query("SELECT * FROM details where id = $id");

$row = mysql_fetch_assoc($res);
//echo "<pre>";
//print_r($row);
//echo "<pre>";
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            width: 1200px;
            margin: 0 auto;
        }
        .back{
            text-align: right;
            display: block;
            margin: 10px 0;
            padding: 0 30px;
            border-radius: 5px;
            line-height: 30px;
        }
        header {
            text-align: center;
        }

        .title {
            text-align: center;
        }

        .title > span {
            margin: 0 50px;
        }

        .main {
            font-size: 12px;
        }
    </style>
</head>
<body>
<a class="back" href="../AllContent.php">返回上一层</a>
<header>
    <h1><?php echo $row['headline'] ?></h1>
</header>
<p class="title">
    <span>作者:&nbsp;<?php echo $row['author'] ?></span>
    <span>点击率:&nbsp;<?php echo $row['click_rate'] ?></span>
    <span>发布时间:&nbsp;<?php echo $row['time'] ?></span>
</p>
<hr>
<div class="main">
    <?php echo $row['content'] ?>
</div>
<div style="width: 100%;height: 50px;"></div>
</body>
</html>


























