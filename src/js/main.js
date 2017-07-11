/**
 * Created by xian1 on 2017/7/5.
 */
(function () {
    $.ajax({
        url: "src/php/mainTechniquesharing.php",
        dataType: "json",
        success: function (data) {
            document.getElementById('content').innerHTML = template('test', data);
        }
    });
})();

(function () {
    $.ajax({
        url: "src/php/mainMyselfLog.php",
        dataType: "json",
        success: function (data) {
            document.getElementById('log').innerHTML = template('test2', data);
        }
    });
})();