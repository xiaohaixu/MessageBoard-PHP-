<?php
// 设置公有常量
define('APP_PATH', realpath(__DIR__)); // 当前应用程序目录
// 引入函数库
require_once 'model/db.php';
require_once 'model/user.php';
// 获取当前登录的用户名
$loginedUser = getLoignedUser();
$loginedUserId = getUserIdByName($loginedUser);
// 判断用户是否已经提交登录表单
if(isset($_POST['m_title'])){ //用户提交登录表单
  // 获取表单数据
  $m_title = $_POST['m_title'];
  $m_content = $_POST['m_content'];

  // 添加留言到数据库中
  $status = insertMsg($m_title, $m_content, $loginedUserId);
  // 添加留言后的处理
  if($status){ // 添加留言成功
    $responseMsg = "添加留言成功";
  }else{ // 添加留言失败
    $responseMsg = "添加留言失败";
  }
  include_once 'view/after_add_msg.php';
} else { //用户没有提交登录表单
  // 显示表单
  include_once 'view/add_msg.php';
}
?>
