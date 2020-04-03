 $("#upinfo").click(function () {
                var e = 0;
                var user = $("#username").val();
                var pass = $("#password").val();
                if (user == "") {
                    swal("An Error", "用户名不能为空", "error");
                    return false;
                }
                if (pass == "") {
                    swal("An Error", "密码不能为空", "error");
                    return false;
                }
        })