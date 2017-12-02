<?php
// 显示单条留言信息
// 设置公有常量
define('APP_PATH', realpath(__DIR__)); // 当前应用程序目录
// 加载函数库
require_once 'model/db.php';
require_once 'model/user.php';

// 获取当前登录的用户名
$loginedUser = getLoignedUser();
$r_u_id = getUserIdByName($loginedUser);
// 获取当前要显示的留言的主键id（获取get参数）
$mid = $_GET['msg_id'];

if(isset($_POST['r_content'])){
  // 获取表单数据
  $r_u_id = $_POST['r_u_id'];
  $r_m_id = $_POST['r_m_id'];
  $r_content = $_POST['r_content'];
  // 执行数据库插入
  $status = addRmsgs($r_u_id, $r_m_id, $r_content);
  // 后续处理
  header("Location: view.php?msg_id=$r_m_id");
}else{ //用户没有提交登录表单
  // 获取当前主键id所对应的留言信息
  $msg = getMsgsById($mid);
  $rmsgs = getRmsgsByMid($mid);
  //print_r($rmsgs);
  // 显示视图文件
  include_once APP_PATH . '/view/view.php';
}

 ?>
