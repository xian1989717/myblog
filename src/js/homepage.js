/**
 * Created by xian1 on 2017/6/30.
 */

KindEditor.ready(function (K) {
    window.editor = K.create('#editor_id');
});
(function () {
    //这个是控制右侧主体内容显示和隐藏的代码
    $("main>#nav>div").on("click", function () {
        $(this).css("background", "#ccc").siblings().css("background", "#efefef");
        var $flag = $(this).attr("tit");
        $("#content>div:nth-of-type(" + $flag + ")").css("display", "block").siblings().css("display", "none");
    });
})();
(function () {
    $(".pic>.picCon>.linkParent").find("a:nth-of-type(1)").on("click", function () {
        $(".upload").css("display", "block");
    })
})();
