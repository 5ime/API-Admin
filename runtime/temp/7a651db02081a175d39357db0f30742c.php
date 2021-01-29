<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"D:\phpStudy\PHPTutorial\WWW\site\api-admin\public/../application/admin\view\login\index.html";i:1611840134;}*/ ?>
<html lang="zh" class="perfect-scrollbar-on"><head>
	<meta charset="utf-8">
	<link rel="apple-touch-icon" sizes="76x76" href="/public/static/admin/img/apple-icon.png">
	<link rel="icon" type="image/png" href="/public/static/admin/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>API-Admin</title>
	<meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
	<link href="/public/static/admin/css/material-dashboard.css?v=2.1.2" rel="stylesheet">
	<link href="/public/static/admin/demo/demo.css" rel="stylesheet">
</head>
<body class="offline-doc">
  <div class="page-header clear-filter">
    <div class="page-header-image"  style="background-image: url('https://tenapi.cn/acg/');"></div>
    <div class="content-center">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand">
          <h1 class="title">API-Admin</h1>
          <h3 class="description">后台登录</h3>
		  <br />
		  <form action="<?php echo url('login/fromlogin'); ?>" method="post">
			<div class="row">
				<div class="col-md-12">
				  <div class="form-group bmd-form-group">
					<label>Username</label>
					<input name="username" autocomplete="off" type="text" class="form-control" style="color: #fff;text-align: center;">
				  </div>
				</div>
			  </div>
			  <br>
			  <div class="row">
				  <div class="col-md-12">
					<div class="form-group bmd-form-group">
					  <label>Password</label>
					  <input name="password" type="password" class="form-control" style="color: #fff;text-align: center;">
					</div>
				  </div>
				</div>  
				<br />
				<button type="submit" class="btn btn-primary btn-round btn-lg">Login</a>
			  </form>
        </div>
      </div>
    </div>
  </div>
  <script src="/public/static/admin/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="/public/static/admin/js/core/popper.min.js" type="text/javascript"></script>
  <script src="/public/static/admin/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="/public/static/admin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="/public/static/admin/js/plugins/chartist.min.js"></script>
  <script src="/public/static/admin/js/plugins/bootstrap-notify.js"></script>
  <script src="/public/static/admin/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <script src="/public/static/admin/demo/demo.js"></script>
</body>
</html>