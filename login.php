<?php
// 设置公有常量
define('APP_PATH', realpath(__DIR__)); // 当前应用程序目录

// 引入函数库
require_once 'model/user.php';
// 获取当前登录的用户名
$loginedUser = getLoignedUser();
// 判断用户是否已经提交登录表单
if(isset($_POST['username'])){ // 用户已经提交登录表单
  // 获取表单数据
  $username = $_POST['username'];
  $password = $_POST['password'];
  // 实现用户登录
  $status = doUserLogin($username, $password);
  // 实现用户登录后的处理
  if($status){ // 登录成功
    // 给出登录成功提示
    $responseMsg = "用户登录成功";
  } else { // 登录失败
    // 给出登录失败提示
    $responseMsg = "用户登录失败";
  }
  include_once 'view/login_success.php';
  //echo "<script type='text/javascript'>alert('{$responseMsg}'); window.location.href = index.php;</script>";
} else { // 用户没有提交登录表单
  // 显示登录表单
  include_once 'view/login.php';
}
 ?>
