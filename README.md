# 食用方法

此程序基于ThinkPHP5.0 PHP版本需`≥7.0`

`Nginx`请设置如下`伪静态` `Apache`无需配置 运行目录`默认`即可
```
location / {
	if (!-e $request_filename){
		rewrite  ^(.*)$  /index.php?s=$1  last;   break;
	}
}
```

将程序上传至网站根目录,访问`域名/install`进行安装操作

默认账号密码为`admin` `123456` 如需添加API 请将API放入`api`目录

新增API文档编写请参考：https://tenapi.cn/doc QQ交流群：546609030

Bug反馈请提交`Issues`或前往博客留言https://5ime.cn/api-admin.html

# 更新日志
- 2020-4-1 提交API-Admin beta版 新增`随机动漫图API`
- 2020-4-7 新增`抖音无水印解析API`,`IP签名图API`,`免KEY加群API`
- 2020-4-15 新增安装页面/优化部分代码 新增`网站ICO获取API`,`网站icp备案查询API`,`历史上的今天API`,`QQ头像获取API`,`QQ在线状态查询API`,`服务器信息获取API`,`网站标题获取API`,`爱站权重获取API`,`城市天气获取API`,`随机一言API`
- 2020-4-20 修复移动端菜单栏不显示/优化部分代码
- 2020-4-22 更新首页样式
- 2020-4-23 新增`皮皮虾无水印解析API`，`每日Bing获取API`,`QQ短网址获取API`,`垃圾分类查询API`,`手机号归属地查询API`,`顺通快递查询API`

# 预览图
## 首页
![首页1](https://user-images.githubusercontent.com/31686695/79971370-c7e0a200-84c6-11ea-9ab2-b8a0f5fab7e1.png)
![首页2](https://user-images.githubusercontent.com/31686695/79971379-ca42fc00-84c6-11ea-9dad-856a844d6e6b.png)
## 文档
![3](https://user-images.githubusercontent.com/31686695/78222952-b07e4c80-74f8-11ea-9434-881d02610e96.png)
![4](https://user-images.githubusercontent.com/31686695/78222961-b2e0a680-74f8-11ea-93eb-72303da82f3a.png)
## 登录
![LS}D{``}%%I%B6I55ZX( NB](https://user-images.githubusercontent.com/31686695/78245835-bb49d900-751a-11ea-9709-f43e1916fde2.png)
## 后台
![6](https://user-images.githubusercontent.com/31686695/78222955-b1af7980-74f8-11ea-8778-89c8c5cc40d5.png)
![7](https://user-images.githubusercontent.com/31686695/78222962-b2e0a680-74f8-11ea-8bba-86fc607818dc.png)
# 免责声明
本仓库只为学习研究，如涉及侵犯个人或者团体利益，请与我取得联系，我将主动删除一切相关资料，谢谢！
