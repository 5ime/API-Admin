var inst = new mdui.Drawer('#drawer');

mdui.$('#search').on('keyup', function(e) {
    var key = e.which;
    if (key == 13) {
        var value = this.value;
        console.log(value);
        if (value) {
            $.get("/admin/index/apiSearchlist?keyword=" + value, function(data) {
                $(".loading").show();
                if (data.code == 201) {
                    mdui.snackbar({
                        message: data.msg
                    });
                    $(".loading").hide();

                } else {
                    window.location.href = '/admin/index/apiSearch' + '?keyword=' + value;
                }
            });
        } else {
            mdui.snackbar({
                message: '请输入关键字'
            });
        }
    }
});

mdui.$('#toggle').on('click', function() {
    inst.toggle();
});

mdui.$('#getInfo').on('click', function() {
    var path = mdui.$('#apiPath').val();
    var apiType = mdui.$('#apiType').val();
    var apiValue = mdui.$('#apiValue').val();
    if (path == "") {
        mdui.snackbar({
            message: '请输入接口地址',
        });
        return;
    }
    if (apiType == 'request') {
        var apiType = 'get';
    }
    var apiUrl = window.location.host + path + "/";
    $(".loading").show();
    $.ajax({
        url: apiUrl,
        type: apiType,
        data: apiValue,
        success: function(data) {
            $(".loading").hide();
            $("#apiInfo").val(data)
        },
        error: function(data) {
            $(".loading").hide();
            mdui.alert('请求失败，请确保接口可正常访问或手动填写接口返回数据', '提示');
        }
    });
});

mdui.$('#upDate').on('click', function() {
    $(".loading").show();
    $.get("/admin/index/siteUpdate", function(data) {
        $(".loading").hide();
        if (data.code == 201) {
            mdui.snackbar({
                message: '当前版本已是最新版本'
            });
        } else {
            mdui.dialog({
                title: '更新提示',
                content: '<h4>检测到新版本，是否更新？</h4>更新日志<br>' + decodeURI(data.data.content),
                buttons: [{
                        text: '取消'
                    },
                    {
                        text: '前往下载',
                        onClick: function() {
                            window.open(data.data.download);
                            this.close();
                        }
                    }
                ]
            });
        }
        return false;
    });
});

$("#getUserinfo").click(function() {
    $.get("/admin/index/editUserinfo", function(data) {
        if (data.code == 200) {
            $("#username").val(data.data.username);
            $("#email").val(data.data.email);
        } else {
            mdui.snackbar({
                message: data.msg
            });
        }
    });
});

$("#putUserinfo").click(function() {
    var username = $("#username").val();
    var password = $("#password").val();
    var email = $("#email").val();
    $.post("/admin/index/editUserinfo", {
        username: username,
        password: password,
        email: email
    }, function(data) {
        if (data.code == 200) {
            mdui.snackbar({
                message: data.msg
            });
        } else {
            mdui.snackbar({
                message: data.msg
            });
        }
    });
})


function apiEdit(id) {
    window.location.href = '/admin/api/apiEdit?id=' + id;
}

function sortEdit(id) {
    window.location.href = '/admin/sort/sortEdit?id=' + id;
}

function postEdit(id) {
    window.location.href = '/admin/post/postEdit?id=' + id;
}

function reEdit(id) {
    window.location.href = '/admin/index/blackEdit?id=' + id;
}

function apiDelete(id) {
    mdui.confirm('确定删除吗？', function() {
        $.ajax({
            url: "/admin/api/apiOper",
            type: "post",
            data: { id: id },
            dataType: "json",
            success: function(json) {
                if (json.code == 200) {
                    mdui.snackbar({
                        message: json.msg,
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                } else {
                    mdui.snackbar({
                        message: json.msg,
                    });
                }
            }
        });
    });
}

function sortDelete(id) {
    mdui.confirm('确定删除吗？', function() {
        $.ajax({
            url: "/admin/sort/sortOper",
            type: "post",
            data: { id: id },
            dataType: "json",
            success: function(json) {
                if (json.code == 200) {
                    mdui.snackbar({
                        message: json.msg,
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                } else {
                    mdui.snackbar({
                        message: json.msg,
                    });
                }
            }
        });
    });
}

function postDelete(id) {
    mdui.confirm('确定删除吗？', function() {
        $.ajax({
            url: "/admin/post/postOper",
            type: "post",
            data: { id: id },
            dataType: "json",
            success: function(json) {
                if (json.code == 200) {
                    mdui.snackbar({
                        message: json.msg,
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                } else {
                    mdui.snackbar({
                        message: json.msg,
                    });
                }
            }
        });
    });
}

function reDelete(id) {
    mdui.confirm('确定删除吗？', function() {
        $.ajax({
            url: "/admin/index/blackOper",
            type: "post",
            data: { id: id },
            dataType: "json",
            success: function(json) {
                if (json.code == 200) {
                    mdui.snackbar({
                        message: json.msg,
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                } else {
                    mdui.snackbar({
                        message: json.msg,
                    });
                }
            }
        });
    });
}

function logout() {
    mdui.confirm('确定注销吗？', function() {
        $.ajax({
            url: "/admin/index/logout",
            type: "get",
            dataType: "json",
            success: function(json) {
                if (json.code == 200) {
                    mdui.snackbar({
                        message: json.msg,
                    });
                    setTimeout(function() {
                        window.location.href = '/';
                    }, 1000);
                } else {
                    mdui.snackbar({
                        message: json.msg,
                    });
                }
            }
        });
    });
}
