<?php
// 设置公有常量

$dbConfig = require_once APP_PATH.'/config/db.php';
//数据库相关操作函数库
/**
 * 初始化数据库连接
 * @param  array  $dbConfig [数据库连接配置参数（数组形式）]
 */
function initDbConnect(){
  global $dbConfig;
  //建立数据库连接
  //$db = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8mb4', 'username', 'password');
  $db=new PDO("mysql:host=".$dbConfig['db_host'].";
                dbname=".$dbConfig['db_name'], $dbConfig['db_user'], $dbConfig['db_pwd'],
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                //PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼
  //$link = mysql_connect("{$dbConfig['db_host']}:{$dbConfig['db_port']}", $dbConfig['db_user'], $dbConfig['db_pwd']);
  //判断连接是否成功
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //錯誤訊息提醒
  return $db;
  // if(!$link){
  //   die('连接失败:'.mysql_error($link));
  // }
  //选择数据库
//  mysql_select_db($dbConfig['db_name']);
  //设置数据库连接字符编码
//  mysql_set_charset($dbConfig['db_charset']);
}

/**
 * 获取msgs表中的所有数据
 * @return [array] [返回二维数组]
 */
function getAllMsgs() {

  // 连接数据库
  $db = initDbConnect();
  // 获取所有留言信息（只考虑msgs表，暂时不考虑rmsgs表）
  $sql = "select * from msgs";
  $allMsgs = $db->query($sql);
  // 处理结果集
  $results = array();
  while ($row = $allMsgs->fetch(PDO::FETCH_ASSOC)) {
    $results[] = $row;
  }
  //返回结果集
  return $results;
}

/**
 * 关闭数据库
 */
function closeConnect() {
  $db = null;
}
?>
