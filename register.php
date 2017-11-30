<?php
// 设置公有常量
define('APP_PATH', realpath(__DIR__)); // 当前应用程序目录
// 引入函数库
require_once 'model/user.php';
// 获取当前登录的用户名
$loginedUser = getLoignedUser();

if(isset($_POST['username'])){ // 已经提交注册表单
  // 接收表单数据
  $username = $_POST['username'];
  $password = $_POST['password'];
  // 实现用户注册
  $status = doUserRegister($username, $password);
  // 实现注册后的行为
  if($status){ // 注册成功
    $responseMsg = '用户注册成功，请登录！';
    $toUrl = 'login.php';
  }else{ // 注册失败
    $responseMsg = '用户注册失败，请重新注册！';
    $toUrl = 'register.php';
  }
  include_once 'view/after_register.php';
}else{ // 没有提交注册表单
  // 显示注册表单
  include_once 'view/register.php';
}
?>
