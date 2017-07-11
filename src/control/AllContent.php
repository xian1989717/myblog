<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../css/base.css">
    <style>
        tr {
            height: 30px;
        }

        td {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        .wrap {
            text-align: left;
            margin-bottom: 20px;
        }

        .back {
            padding: 10px 20px;
            margin: 0 30px;
            border-radius: 2px;
            line-height: 30px;
            background: blue;
            color: white;
            font-size: 14px;
        }

        .click:hover {
            color: blue;
        }
    </style>
</head>
<body style="text-align:center;width:1560px;background: #ccc;margin:10px auto">
<header style="line-height: 40px;margin: 10px;"><h2>全部内容</h2></header>
<div class="wrap">
    <a class="back" href="homepage.html">返回主页</a>
</div>
<main>
    <?php
    include "../php/connectMysql.php";
    $db_table = "myblog";
    if (!mysql_select_db($db_table)) {
        echo "连接表失败!" . mysql_error();
    };
    $res = mysql_query("SELECT * FROM details");
    ?>
    <table border="1" style="background: #efefef;table-layout: fixed;width:100%">
        <td>照片路径</td>
        <td>标题</td>
        <td>点击率</td>
        <td>作者</td>
        <td>时间</td>
        <td>标签</td>
        <td>文章类型</td>
        <td>网站描述</td>
        <td>操作</td>
        </tr>
        <?php
        while ($row = mysql_fetch_assoc($res)) {
            ?>
            <tr>
                <td><?php echo $row['title_img']; ?></td>
                <td>
                    <a class="click" href="controller/examine.php?id=<?php echo $row['id'] ?>"
                       title="<?php echo $row['headline']; ?>"><?php echo $row['headline']; ?></a>
                </td>
                <td><?php echo $row['click_rate']; ?></td>
                <td><?php echo $row['author']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['label']; ?></td>
                <td><?php echo $row['text_type']; ?></td>
                <td><a href="javascript:;" title="<?php echo $row['mydescribe'] ?>"><?php echo $row['mydescribe'] ?></a>
                </td>
                <td>
                    <a class="click" href="controller/examine.php?id=<?php echo $row['id'] ?>">查看</a>&nbsp;|&nbsp;
                    <a class="click" href="javascript:;" onclick="del(<?php echo $row['id'] ?>)">删除</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</main>
</body>
</html>
<script>
    function del(id) {
        if (confirm("您确定要删除么?")) {
            location.href = "controller/del.php?id=" + id;
        }
    }
</script>