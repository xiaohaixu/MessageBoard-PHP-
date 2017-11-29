<?php
// 显示单条留言信息
// 设置公有常量
define('APP_PATH', realpath(__DIR__)); // 当前应用程序目录
// 加载函数库
require_once 'model/db.php';
require_once 'model/user.php';

// 获取当前登录的用户名
$loginedUser = getLoignedUser();

// 获取当前要显示的留言的主键id（获取get参数）
$mid = $_GET['msg_id'];
// 获取当前主键id所对应的留言信息
$msg = getMsgsById($mid);
//print_r($msg);
// 显示视图文件
include_once APP_PATH . '/view/view.php';
 ?>
