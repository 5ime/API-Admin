<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:91:"D:\phpStudy\PHPTutorial\WWW\site\api-admin\public/../application/admin\view\index\user.html";i:1611837502;s:18:"public/header.html";i:1611838041;s:18:"public/footer.html";i:1611837800;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/public/static/admin/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/public/static/admin/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    API管理后台
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="/public/static/admin/css/font.css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <!-- CSS Files -->
  <link href="/public/static/admin/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/public/static/admin/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="/public/editormd/css/editormd.css" />

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="/public/static/admin/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="<?php echo url('index/index'); ?>" class="simple-text logo-normal">
          API管理后台
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="<?php echo url('index/index'); ?>">
              <i class="material-icons">dashboard</i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo url('index/list'); ?>">
              <i class="material-icons">content_paste</i>
              <p>API列表</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('index/add'); ?>">
              <i class="material-icons">bubble_chart</i>
              <p>添加API</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('index/site'); ?>">
              <i class="material-icons">library_books</i>
              <p>站点设置</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('index/user'); ?>">
              <i class="material-icons">person</i>
              <p>管理员信息</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" onclick="md.showNotification('bottom','center')">
              <i class="material-icons">unarchive</i>
              <p>检测程序更新</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="<?php echo url('../index'); ?>">站点首页</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="<?php echo url('index/user'); ?>">信息修改</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo url('index/logout'); ?>">退出登录</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar --> 

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">管理员信息</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
              </br>
                <div class="card-body">
                  <form action="<?php echo url('index/upuser'); ?>" method="post">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">新用户名</label>
                          <input id="username" name="username" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">新密码</label>
                          <input id="password" name="password" type="password" class="form-control">
                        </div>
                      </div>
                    </div>
                    <button type="submit" id="upinfo" name="uid" value="<?php echo $userinfo['id']; ?>" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="/public/static/admin/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <footer class="footer">
      <div class="container-fluid">
        <nav class="float-left">
          <ul>
            <li>
              <a href="https://github.com/5ime/api-admin">
                API-Admin
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, made with <i class="material-icons">favorite</i> by
          <a href="https://github.com/5ime" target="_blank">I Am I</a> for a better web.
        </div>
      </div>
    </footer>
  </div>
</div>
<!--   Core JS Files   -->
<script src="/public/static/admin/js/core/jquery.min.js" type="text/javascript"></script>
<script src="/public/static/admin/js/core/popper.min.js" type="text/javascript"></script>
<script src="/public/static/admin/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="/public/static/admin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Chartist JS -->
<script src="/public/static/admin/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/public/static/admin/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/public/static/admin/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
<script src="/public/static/admin/demo/demo.js"></script>
<script src="/public/editormd/editormd.min.js"></script>
<script>
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
</script>
<script type="text/javascript">
    $(function() {
        var editor = editormd("test-editor", {
            width  : "100%",
            toolbarIcons : function() { 
              return editormd.toolbarModes['mini']; // full, simple, mini
            },
            height : 440,
            path   : "/public/editormd/lib/",
            htmlDecode : true,
        });
    });
</script>
</body>
</html>

