<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"D:\phpStudy\PHPTutorial\WWW\site\api-admin\public/../application/index\view\index\index.html";i:1611919367;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $info['title']; ?></title>
    <meta name="description" content="<?php echo $info['description']; ?>">
    <meta name="keywords" content="<?php echo $info['keywords']; ?>">
	<link rel="stylesheet" type="text/css" href="public/static/index/css/flaghome.css">
</head>
<body>
<div class="background">
	<canvas id="startrack"></canvas>
	<div class="cover">
	</div>
</div>
<div class="main">
	<div class="ch intro">
		<div class="container">
			<div class="hello">
				<h1 id="slogan">思考中……</h1>
				<h2>
				<div class="circle">
					<span></span><span></span><span></span>
				</div>
				<?php echo $info['title']; ?>免费提供Api服务
				</h2>
			</div>
		</div>
	</div>
</div>
<div class="find ch">
	<div class="container links">
			<h2 class="chtitle"><span>API列表</span></h2>
			<div class="clear">
				<?php if(is_array($api) || $api instanceof \think\Collection || $api instanceof \think\Paginator): $i = 0; $__LIST__ = $api;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$api): $mod = ($i % 2 );++$i;if(($api['sort'] == 0)): ?> 
				<a href="/doc/<?php echo $api['doc']; ?>" target="_blank">
					<div class="item">
					<div class="bg" style="background-color: #28A9E0"></div>
					<div class="inner">
						<span><?php echo $api['name']; ?></span>
					</div>
					</div>
				</a>
				<?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
	</div>
	<div class="footer ch">
		<div class="container">
			<p><script type="text/javascript" src="https://tenapi.cn/yiyan/get/"></script></p>
			<p class="c">Make by <a href="http://flag.Moe"rel="nofollow" target="_blank">flag.Moe</a>|Second revision by <a href="#"><?php echo $info['title']; ?></a></p>
		</div>
	</div>
</div>
<script src="public/static/index/js/jquery-1.9.1.min.js"></script>
<script src="public/static/index/js/page.js"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?<?php echo $info['baidutongji']; ?>";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</body>
</html>
