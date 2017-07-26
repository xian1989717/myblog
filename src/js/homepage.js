/**
 * Created by xian1 on 2017/6/30.
 */
KindEditor.ready(function (K) {
    window.editor = K.create('#editor_id');
});
(function () {
    var router = new VueRouter();

    var App = Vue.extend({
        methods: {
            touch: function () {
                $(event.currentTarget).css("background", "#ccc").siblings().css("background", "#efefef");
            },
            close: function () {
                $(event.currentTarget).parent().css("display", "none");
                $(".shade").css("display", "none");
            }
        }
    });
    var TechniqueSharing = Vue.extend({
        template: '#tpl'
    });
    var pic = Vue.extend({
        template: '#tp2',
        data: function () {
            return {
                list: [],
                picName: '',
                isShow: true,
                changeName: "修改名称",
                dirName: ""    //照片存储的字文件夹
            }
        },
        created: function () {
            this.selectPicDir();

        },
        methods: {
            submit: function () {
                this.$http.get("controller/createPicDir.php?name=" + this.picName).then(function (response) {
                    this.list.push({id: response.body.id, picName: response.body.picDir});
                    this.selectPicDir();
                });
            },
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
            updataPic: function (name) {
                $(".shade").css("display", "block");
                $(".upload").css("display", "block");
                document.getElementById("test").setAttribute("value", name);
            },
            changeDirName: function (id, name) {
                var e = event;
                var ec = e.currentTarget;
                var ecf = e.srcElement.parentElement.parentElement.firstElementChild;
                if (ec.innerHTML == "保存文件名") {
                    this.$http.get("controller/changeDirName.php?id=" + id + "&picNewDirName=" + ecf.nextElementSibling.value + "&picOldDirName=" + name).then(function (response) {
                        if (response.body == "success") {
                            this.selectPicDir();
                        }
                    });
                    ecf.style.display = "block";
                    ecf.nextElementSibling.style.display = "none";
                } else {
                    ecf.style.display = "none";
                    ecf.nextElementSibling.style.display = "block";
                }
                ec.innerHTML == "修改文件名" ? ec.innerHTML = "保存文件名" : ec.innerHTML = "修改文件名";
            },
            delPicDir: function (id, picName) {
                this.$http.get("../control/controller/delPicDir.php?picDirId=" + id + "&picName=" + picName).then(function (response) {
                    if (response.body == "success") {
                        console.log("11111");
                        this.selectPicDir();
                    }
                });
            }
        }
    });
    var myself = Vue.extend({
        template: '#tp3'
    });
    var connectMine = Vue.extend({
        template: '#tp4'
    });
    router.map({
        'TechniqueSharing': {component: TechniqueSharing},
        'pic': {component: pic},
        'myself': {component: myself},
        'connectMine': {component: connectMine}
    });
    router.start(App, '#app');
    router.redirect({'/': '/TechniqueSharing'});
})();
