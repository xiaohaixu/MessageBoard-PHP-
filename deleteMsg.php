<?php
// 设置公有常量
define('APP_PATH', realpath(__DIR__)); // 当前应用程序目录
// 引入函数库
require_once 'model/db.php';
// 获取当前登录的用户名
//$loginedUser = getLoignedUser();
// 获取get参数（得到待删除记录的主键ID）
$m_id = $_GET['msg_id'];
//执行delete操作
deleteMsgById($m_id);
// 删除后的处理
header('Location: index.php');
?>
