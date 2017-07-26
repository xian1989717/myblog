<?php
include "../../php/connectMysql.php";

//连接数据库
$db_table = "myblog";
if (!mysql_select_db($db_table)) {
    echo "连接数据表失败" . mysql_error();
}

//1.获取上传文件信息
$upfile = $_FILES["picFile"];
//获得file_url的值
$tempDirName = $_POST['dirName'];

//获取图片标题
$picTitle = $_POST['name'];
//获取图片描述信息
$picDescribe = $_POST['picDescribe'];


//得到真正的服务器上面的文件夹的名称
$res = mysql_fetch_assoc(mysql_query("SELECT * FROM pic_content where file_url = '$tempDirName'"));
$dirName = $res['dir_name'];


//定义允许的类型
$typelist = array("image/jpeg", "image/jpg", "image/png", "image/gif");

//文件夹路径
$path = "../../uploads/" . $dirName . "/";


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

$imgUrl = "http://www.blogs.com/src/uploads/" . $dirName . "/" . $newfile;

$res = mysql_query("INSERT INTO `$dirName`(time,img_title,pic_url,pic_describe,img_parent_folder)
                                                  VALUES(now(),'$picTitle','$imgUrl','$picDescribe','$dirName')");


if ($res) {
    header("Location:../homepage.html#!/pic");
}

?>













