<?php
include "../../php/connectMysql.php";


//1.获取上传文件信息
$upfile = $_FILES["pic"];
//定义允许的类型
$typelist = array("image/jpeg", "image/jpg", "image/png", "image/gif");
$path = "../../uploads/";//定义一个上传后的目录
//2.过滤上传文件的错误号
if ($upfile["error"] > 0) {
    switch ($upfile['error']) {//获取错误信息
        case 1:
            $info = "上传得文件超过了 php.ini中upload_max_filesize 选项中的最大值.";
            break;
        case 2:
            $info = "上传文件大小超过了html中MAX_FILE_SIZE 选项中的最大值.";
            break;
        case 3:
            $info = "文件只有部分被上传";
            break;
        case 4:
            $info = "没有文件被上传.";
            break;
        case 6:
            $info = "找不到临时文件夹.";
            break;
        case 7:
            $info = "文件写入失败！";
            break;
    }
    die("上传文件错误,原因:" . $info);
}
//3.本次上传文件大小的过滤（自己选择）
if ($upfile['size'] > 1000000) {
    die("上传文件大小超出限制");
}
//4.类型过滤
if (!in_array($upfile["type"], $typelist)) {
    die("上传文件类型非法!" . $upfile["type"]);
}
//5.上传后的文件名定义(随机获取一个文件名)
$fileinfo = pathinfo($upfile["name"]);//解析上传文件名字
do {
    $newfile = date("YmdHis") . rand(1000, 9999) . "." . $fileinfo["extension"];
} while (file_exists($path . $newfile));
//6.执行文件上传
//判断是否是一个上传的文件
if (is_uploaded_file($upfile["tmp_name"])) {
//执行文件上传(移动上传文件)
    if (move_uploaded_file($upfile["tmp_name"], $path . $newfile)) {
    } else {
        die("上传文件失败！");
    }
} else {
    die("不是一个上传文件!");
}
$title = $_POST['title'];
$textType = $_POST['text_type'];
$author = $_POST['author'];
$label = $_POST['label'];
$describe = $_POST['describe'];
$content = $_POST['content'];

$imgUrl = "http://www.blogs.com/src/uploads/" . $newfile;

$db_table = "myblog";
if (!mysql_select_db($db_table)) {
    echo "选择数据表错误!" . mysql_error();
}


$res = mysql_query("INSERT INTO details(title_img,headline,click_rate,author,content,time,label,text_type,mydescribe)
                           VALUES('$imgUrl','$title',0,'$author','$content',now(),'$label','$textType','$describe')");
if ($res) {
    echo "<div id='div'>更新成功!5秒后跳转到编辑页面!</div>";
    ?>
    <script>
        console.log("1111");
        var num = 5;
        var div = document.getElementById("div");
        var timer = setInterval(function () {
            num--;
            div.innerHTML = "更新成功!" + num + "秒后跳转到编辑页面!";
            if (num == 0) {
                clearInterval(timer);
                window.location.href = '../homepage.html';
            }
        }, 1000);
    </script>


    <?php
}
?>








































