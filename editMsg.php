<?php
// 设置公有常量
define('APP_PATH', realpath(__DIR__)); // 当前应用程序目录
// 引入函数库
require_once 'model/db.php';
require_once 'model/user.php';
// 获取当前登录的用户名
$loginedUser = getLoignedUser();
// 获取当前登录的用户ID
$loginedUserId = getUserIdByName($loginedUser);
// 获取当前待修改的留言主键id
$m_id = $_GET['msg_id'];
// 判断用户是否已经提交登录表单
if(isset($_POST['m_title'])){ //用户提交登录表单
  // 获取表单数据
  $m_title = $_POST['m_title'];
  $m_content = $_POST['m_content'];

  // 修改留言到数据库中
  $status = updateMsg($m_id, $m_title, $m_content);
  // 修改留言后的处理
  if($status){ // 修改留言成功
    $responseMsg = "修改留言成功";
  }else{ // 修改留言失败
    $responseMsg = "修改留言失败";
  }
  include_once 'view/after_edit_msg.php';
} else { //用户没有提交登录表单
  // 获取原始留言数据
  $msg = getMsgsById($m_id);
  // 显示表单
  include_once 'view/edit_msg.php';
}
?>
