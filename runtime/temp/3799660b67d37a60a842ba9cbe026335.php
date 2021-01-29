<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:92:"D:\phpStudy\PHPTutorial\WWW\site\api-admin\public/../application/admin\view\index\index.html";i:1611919063;s:18:"public/header.html";i:1611919610;s:18:"public/footer.html";i:1611916210;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/public/static/admin/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/public/static/admin/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    API管理后台
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="/public/static/admin/css/font.css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="/public/static/admin/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link href="/public/static/admin/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="/public/editormd/css/editormd.css" />
  <script src="/public/static/admin/js/core/jquery.min.js" type="text/javascript"></script>

</head>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="/public/static/admin/img/sidebar-1.jpg">
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
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('index/add'); ?>">
              <i class="material-icons">bubble_chart</i>
              <p>添加API</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo url('index/list'); ?>">
              <i class="material-icons">content_paste</i>
              <p>API列表</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('index/adds'); ?>">
              <i class="material-icons">apps</i>
              <p>添加分类</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('index/sort'); ?>">
              <i class="material-icons">apps</i>
              <p>分类列表</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('index/site'); ?>">
              <i class="material-icons">library_books</i>
              <p>站点信息</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" onclick='setValue()'>
              <i class="material-icons">autorenew</i>
              <p>检测程序更新</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
<script>
function  setValue(){
  var xmlhttp;
    if (window.XMLHttpRequest){
      xmlhttp=new XMLHttpRequest();
      }
    else{
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp.open("GET","https://tenapi.cn/version/",false);
    xmlhttp.send();
    var jsonObj = JSON.parse(xmlhttp.responseText);
    var v = jsonObj.version;
    if (v > 1.2){
      md.showNotification('bottom','center');
      setTimeout(function(){window.open("https://github.com/5ime/api-admin");}, 5000);
    }
    else{
      md.showNotifications('bottom','center');
    }
}
</script>
    <div class="main-panel">
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
            <form class="navbar-form" action="<?php echo url('Index/search'); ?>" method="get" id="search">
              <span class="bmd-form-group"><div class="input-group no-border">
                <input name="keyword" type="text" value="" class="form-control" placeholder="搜索API">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div></span>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="<?php echo url('index/logout'); ?>" rel="tooltip" data-original-title="退出登录">
                  <i class="material-icons">exit_to_app</i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">equalizer</i>
                  </div>
                  <p class="card-category">总调用数</p>
                  <h3 class="card-title"><?php echo $num; ?><small>次</small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    每天12点更新&nbsp;<a href="#">点我查看如何设置定时任务</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">总API数</p>
                  <h3 class="card-title"><?php echo $count; ?><small>个</small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    Just So So...
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">管理员信息</h4>
                </div>
                <div class="card-body">
                  <form action="<?php echo url('index/upuser'); ?>" method="post">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">用户名</label>
                          <input name="username" value="<?php echo $userinfo['username']; ?>" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">新密码</label>
                          <input name="password" type="password" class="form-control">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">确认修改</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title">帮助信息</h4>
                </div>
                <div class="card-body">
                  <div class="tim-typo">
                    <p class="text-primary">
                      <p>添加API教程</p>
                      <a href="https://github.com/5ime/API-Admin">https://github.com/5ime/API-Admin/wiki</a></p>
                  </div>
                  <div class="tim-typo">
                    <p class="text-info" >
                      <p>欢迎Star和Issues</p>
                      <a href="https://github.com/5ime/API-Admin">https://github.com/5ime/API-Admin</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <footer class="footer">
      <div class="container-fluid">
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, made with <i class="material-icons">favorite</i> by
          <a href="https://github.com/5ime/api-admin" target="_blank"> API-Admin</a> for a better web.
        </div>
      </div>
    </footer>
  </div>
</div>
<script src="/public/static/admin/js/core/popper.min.js" type="text/javascript"></script>
<script src="/public/static/admin/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="/public/static/admin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="/public/static/admin/js/plugins/chartist.min.js"></script>
<script src="/public/static/admin/js/plugins/bootstrap-notify.js"></script>
<script src="/public/static/admin/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
<script src="/public/static/admin/demo/demo.js"></script>
<script src="/public/editormd/editormd.min.js"></script>
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
