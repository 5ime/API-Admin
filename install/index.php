<?php
/**
 * 安装向导
 */
header('Content-type:text/html;charset=utf-8');

// 配置页面
$config = [
    'version'       => 'V2.0',    // 版本

    'indexPage'     => 'a_welcome',             // 首页
    'checkPage'     => 'b_check',               // 检查页
    'createPage'    => 'c_create',              // 数据库数据页
    'endPage'       => 'd_success',             // 安装页
    'errorPage'     => 'error',                 // 错误页

    'sqlName'       => 'api',             // 安装的sql文件名，同该文件同级的sql文件名相同
    'tableName'     => 'api_',                  // 安转的sql文件中的表名前缀，该项是被用户输入替换的
    'databaseUrl'   => '../config/database.php',    // db.php安装地址

    'account'       => 'admin',            // 安装成功后的 登录账号
    'password'      => '123456'                 // 安装成功后的 登录密码
];

// 错误信息
$errorTitle = '出错了';
$errorMsg = '';

// 检测是否安装过
if (file_exists('./install.lock')) {
    $errorTitle = '系统已安装';
    $errorMsg = '你已经安装过该系统，如需重新安装需要先删除 /install/install.lock 文件';
    die(require $config['errorPage'].'.html');
}

// 引入页面
$get = @$_GET['type'] ? $_GET['type'] : $config['indexPage'];

// 判断是否是安装sql页面
if ($get == $config['endPage']) {
    // 判断是否为post
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = $_POST;
        // 连接数据库
        $link = @new mysqli("{$data['DB_HOST']}:{$data['DB_PORT']}", $data['DB_USER'], $data['DB_PWD']);
        // 获取错误信息
        $error = $link->connect_error;
        if (!is_null($error)) {
            // 转义防止和alert中的引号冲突
            $errorMsg = addslashes($error);
            die(require 'error.html');
        }
        // 设置字符集
        $link->query("SET NAMES 'utf8'");
        $link->server_info > 5.0 or die("<script>alert('请将您的mysql升级到5.0以上');history.go(-1)</script>");
        // 创建数据库并选中
        if (!$link->select_db($data['DB_NAME'])) {
            $create_sql = 'CREATE DATABASE IF NOT EXISTS ' . $data['DB_NAME'] . ' DEFAULT CHARACTER SET utf8;';
            if (!$link->query($create_sql)) {
                $errorMsg = '创建数据库失败';
                die(require $config['errorPage'].'.html');
            }
            $link->select_db($data['DB_NAME']);
        }
        // 导入sql数据并创建表
        if (!file_exists($sqlPath = $config['sqlName'] . '.sql')) {
            $errorMsg = '文件丢失:' . $sqlPath;
            die(require $config['errorPage'].'.html');
        }
        // 获取数据
        $sql_str = file_get_contents($sqlPath);
        // 修改表前缀
        $sql_array = preg_split("/;[\r\n]+/", str_replace($config['tableName'],$data['DB_PREFIX'],$sql_str));
        // 循环query
        foreach ($sql_array as $k => $v) {
            if (!empty($v)) {
                $link->query($v);
            }
        }
        $link->close();
        $db_str = <<<php
<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // 数据库类型
    'type'            => 'mysql',
    // 服务器地址
    'hostname'        => '{$data['DB_HOST']}',
    // 数据库名
    'database'        => '{$data['DB_NAME']}',
    // 用户名
    'username'        => '{$data['DB_USER']}',
    // 密码
    'password'        => '{$data['DB_PWD']}',
    // 端口
    'hostport'        => '{$data['DB_PORT']}',
    // 连接dsn
    'dsn'             => '',
    // 数据库连接参数
    'params'          => [],
    // 数据库编码默认采用utf8
    'charset'         => 'utf8',
    // 数据库表前缀
    'prefix'          => '{$data['DB_PREFIX']}',
    // 数据库调试模式
    'debug'           => true,
    // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'deploy'          => 0,
    // 数据库读写是否分离 主从式有效
    'rw_separate'     => false,
    // 读写分离后 主服务器数量
    'master_num'      => 1,
    // 指定从服务器序号
    'slave_no'        => '',
    // 自动读取主库数据
    'read_master'     => false,
    // 是否严格检查字段是否存在
    'fields_strict'   => true,
    // 数据集返回类型
    'resultset_type'  => 'array',
    // 自动写入时间戳字段
    'auto_timestamp'  => false,
    // 时间字段取出后的默认时间格式
    'datetime_format' => 'Y-m-d H:i:s',
    // 是否需要进行SQL性能分析
    'sql_explain'     => false,
    // Builder类
    'builder'         => '',
    // Query类
    'query'           => '\\think\\db\\Query',
    // 是否需要断线重连
    'break_reconnect' => false,
    // 断线标识字符串
    'break_match_str' => [],
];
php;
        // 数据库连接配置文件路径
        if (file_exists($config['databaseUrl'])) {
            // 删除原配置文件
            unlink($config['databaseUrl']);
        }
        // 创建数据库链接配置文件
        file_put_contents($config['databaseUrl'], $db_str);
        // 创建安装锁
        @touch('./install.lock');
    }
}

// 判断是否有该页面
if (file_exists($url = $get . '.html')) {
    require $url;
} else {
    $errorMsg = '没有该安装页面:' . $url;
    die(require $config['errorPage'].'.html');
}

