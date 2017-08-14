/**
 * Created by xian1 on 2017/7/5.
 */

//这个是技术分享
(function () {
    $.ajax({
        url: "src/php/mainTechniquesharing.php",
        dataType: "json",
        success: function (data) {
            console.log(data);
            document.getElementById('content').innerHTML = template('test', data);
        }
    });
})();

//这个是个人简介
(function () {
    $.ajax({
        url: "src/php/mainMyselfLog.php",
        dataType: "json",
        success: function (data) {
            document.getElementById('log').innerHTML = template('test2', data);
        }
    });
})();
