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

**新增的API文档编写请参考：https://tenapi.cn/doc/** 

Bug反馈请提交`Issues`或前往博客留言https://5ime.cn/api-admin.html

# 更新日志
- 2020-4-1 提交API-Admin beta版 新增`随机动漫图API`
- 2020-4-7 新增`抖音无水印解析API`,`IP签名图API`,`免KEY加群API`
- 2020-4-15 新增安装页面/优化部分代码 新增`网站ICO获取API`,`网站icp备案查询API`,`历史上的今天API`,`QQ头像获取API`,`QQ在线状态查询API`,`服务器信息获取API`,`网站标题获取API`,`爱站权重获取API`,`城市天气获取API`,`随机一言API`
- 2020-4-20 修复移动端菜单栏不显示/优化部分代码
- 2020-4-22 更新首页样式
- 2020-4-23 修复已知bug 新增`皮皮虾无水印解析API`，`每日Bing获取API`,`QQ短网址获取API`,`垃圾分类查询API`,`手机号归属地查询API`,`申通快递查询API`
- 2020-8-4 修复部分bug,**建议重新安装**
- 2020-8-21 修复已知bug 新增`蓝奏云直链获取API`，`火山小视频去水印API`,`360/搜狗/百度收录量查询API`,`短网址还原API`
- 20220-9-27 修复部分已知失效API 如有其他失效API请提交Issues

# 预览图
## 首页
![首页1](https://cdn.jsdelivr.net/gh/5ime/api-admin/%E9%A2%84%E8%A7%88%E5%9B%BE/index1.png)
![首页2](https://cdn.jsdelivr.net/gh/5ime/api-admin/%E9%A2%84%E8%A7%88%E5%9B%BE/index2.png)
## 文档
![文档1](https://cdn.jsdelivr.net/gh/5ime/api-admin/%E9%A2%84%E8%A7%88%E5%9B%BE/doc1.png)
![文档2](https://cdn.jsdelivr.net/gh/5ime/api-admin/%E9%A2%84%E8%A7%88%E5%9B%BE/doc2.png)
## 登录
![登录](https://cdn.jsdelivr.net/gh/5ime/api-admin/%E9%A2%84%E8%A7%88%E5%9B%BE/login.png)
## 后台
![后台1](https://cdn.jsdelivr.net/gh/5ime/api-admin/%E9%A2%84%E8%A7%88%E5%9B%BE/admin1.png)
![后台2](https://cdn.jsdelivr.net/gh/5ime/api-admin/%E9%A2%84%E8%A7%88%E5%9B%BE/admin2.png)
# 免责声明
本仓库只为学习研究，如涉及侵犯个人或者团体利益，请与我取得联系，我将主动删除一切相关资料，谢谢！
