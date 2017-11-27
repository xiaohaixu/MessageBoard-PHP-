<?php

// 设置公有常量
define('APP_PATH', realpath(__DIR__)); // 当前应用程序目录
// 加载函数库
require_once 'model/db.php';
//获取所有留言信息
$msgs = getAllMsgs();
// 显示视图文件
include_once 'view/index.html';
?>
