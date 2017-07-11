<?php

$mess = $_GET['mes'];
if ($mess == "1") {
    echo "<div style='width: 100%;text-align: center;'>";
    echo "<h2 id='con' style='margin: 50px auto;color:red;'>账号或者密码错误,请重新输入!5秒后跳转!</h2>";
    echo "</div>";
    ?>
    <script>
        var num = 5;
        console.log(num);
        var con = document.getElementById("con");
        var timer = setInterval(function () {
            con.innerHTML = "账号或者密码错误,请从新输入!" + num + "秒后跳转!";
            num--;
            if (num == 0) {
                clearInterval(timer);
                location.href = "../login.html";
                return;
            }
        }, 1000);
    </script>
    <?php
} else if ($mess == "2") {
    echo "<div style='width: 100%;text-align: center;'>";
    echo "<h2 id='con' style='margin: 50px auto;color:red;'>非法登录!!!!5秒后跳转!</h2>";
    echo "</div>";
    ?>

    <script>
        var num = 5;
        console.log(num);
        var con = document.getElementById("con");
        var timer = setInterval(function () {
            con.innerHTML = "非法登录!!!!" + num + "秒后跳转!";
            num--;
            if (num == 0) {
                clearInterval(timer);
                location.href = "../login.html";
                return;
            }
        }, 1000);
    </script>
    <?php
}
?>


