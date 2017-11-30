<?php
// 设置公有常量
define('APP_PATH', realpath(__DIR__)); // 当前应用程序目录

// 引入函数库
require_once 'model/user.php';
// 实现用户注销
doUserLogout();

// 注销后的处理
header('Location: index.php');
 ?>
