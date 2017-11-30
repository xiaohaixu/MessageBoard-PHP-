<?php
// 开启会话
session_start();
require_once APP_PATH.'/model/db.php';
// 用户登录，注销，注册相关操作函数库

/**
 * 实现用户登录操作
 * @param  [type] $userName [用户名]
 * @param  [type] $userPswd [密码]
 * @return [bool]           [若用户登陆成功，返回true；否则返回false]
 */
function doUserLogin($userName, $userPswd) {
  // 1. 查询用户名和密码是否合法（与数据库校验）
  if(isValidUser($userName, $userPswd)){
    // 2. 如果校验成功，实现登录
    $_SESSION['logined_user'] = $userName;
    return true;
  } else {
    // 3. 如果校验失败，返回false
    return false;
  }
}

/**
 * 实现用户注销操作
 */
function doUserLogout(){
  unset($_SESSION['logined_user']);
  session_destroy();
}
/**
 * 判断当前用户是否处于登录状态
 * @return boolean [若成功（用户处理登录状态），返回当前用户的用户名；否则（没有用户处于登录状态）返回false]
 */
function getLoignedUser() {
  if(isset($_SESSION['logined_user'])){
    return $_SESSION['logined_user'];
  }
  return false;
}
 ?>
