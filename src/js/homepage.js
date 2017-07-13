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
    $(".createDirectory>a").on("click", function () {
        $(this).get("controller/createDir")
    });

})();


(function () {
    new Vue({
        el: "#app",
        data: {
            list: [],
            picName: ''
        },
        methods: {
            selectPicDir: function () {
                var that = this.list;
                $.ajax({
                    url: "../control/controller/selectPicDir.php",
                    success: function (data) {
                        var arr = data.substring(1, data.length - 1).replace(/\"/g, "").split(",");
                        for (var i = 0; i < arr.length; i++) {
                            that.push(arr[i]);
                        }

                    }
                })
            },
            updataPic: function () {
                $(".upload").css("display", "block");
            },
            submit: function () {
                var that = this.list;
                $.ajax({
                    url: "controller/createPicDir.php?name=" + this.picName + "",
                    success: function (data) {
                        that.push(data);
                    }
                })
            }
        }
    });
})();
