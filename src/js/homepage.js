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
        $(this).get("controller/createDir");
    });
})();


(function () {
    new Vue({
        el: "#app",
        data: {
            list: [],
            picName: '',
            isShow: true
        },
        methods: {
            selectPicDir: function () {
                this.list = [];
                this.$http.get("../control/controller/selectPicDir.php").then(function (response) {
                    if (response.body.length == 0) {
                        this.isShow = false;
                        return;
                    } else {
                        var arr = response.body;
                        for (var i = 0; i < arr.length; i++) {
                            this.list.push({id: arr[i].id, picName: arr[i].picDir});
                        }
                        this.isShow = true;
                    }
                });
            },
            delPicDir: function (id, picName) {
                this.$http.get("../control/controller/delPicDir.php?picDirId=" + id + "&picName=" + picName).then(function (response) {
                    if (response.body == "success") {
                        this.selectPicDir();
                    }
                });
            },
            updataPic: function () {
                $(".upload").css("display", "block");
            },
            submit: function () {
                this.$http.get("controller/createPicDir.php?name=" + this.picName).then(function (response) {
                    this.list.push({id: response.body.id, picName: response.body.picDir});
                });
            }
        }
    });
})();
