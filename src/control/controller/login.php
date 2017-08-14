<?php
$account = $_POST['account'];
$password = $_POST['password'];

include '../../php/connectMysql.php';

$db_table = "myblog";


if (!mysql_select_db($db_table)) {
    echo "连接数据库失败" . mysql_error();
}


if (isset($_POST['chris']) && $_POST['chris'] == "liu") {
    if (!($account == "admin" && $password == "123456")) {
        header("Location:error.php?mes=1");
    } else {
        $row = mysql_query("SELECT * FROM cookie where user_name='admin'");
        while ($res = mysql_fetch_assoc($row)) {
            echo "name=$res[user_name];cookieVar=$res[cookie_var]";
        }
    }
} else {
    header("Location:error.php?mes=2");
}
?>
