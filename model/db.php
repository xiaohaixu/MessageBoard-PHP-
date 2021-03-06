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
 * 获取指定页的记录(所有记录中的指定页记录)
 * @param  integer $page     [当前是第几页]
 * @param  integer $pageSize [每一页的记录个数]
 * @return [array]            [二维数组]
 */
function getMsgsByPageNumber( $page = 1, $pageSize = 10) {
  // 构造当前页开始记录的下标
  $pageBegin = ($page - 1) * $pageSize;
  // 连接数据库
  $db = initDbConnect();
  // 获取所有留言信息（只考虑msgs表，暂时不考虑rmsgs表）
  $sql = "select * from msgs limit {$pageBegin}, {$pageSize}";
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
 * 通过主键id获取某条留言详细信息
 * @param  [type] $id [主键]
 * @return [array]     [关联数组]
 */
function getMsgsById($id){
  // 连接数据库
  $db = initDbConnect();
  // 获取所有留言信息（只考虑msgs表，暂时不考虑rmsgs表）
  $sql = "select * from msgs, users where msg_user_id=u_id and msg_id={$id}";
  $allMsgs = $db->query($sql);
  // 处理结果集
  $results = $allMsgs->fetch(PDO::FETCH_ASSOC);
  //返回结果集
  return $results;
}
/**
 * 获取留言板数据库所有记录个数
 * @return [int] [记录个数]
 */
function getMsgsCount(){
  // 连接数据库
  $db = initDbConnect();
  $sql = "select count(*) from msgs";
  $allMsgs = $db->query($sql);
  $num_rows = $allMsgs->fetchColumn();
  return $num_rows;
}

/**
 * 根据传入的用户名和密码判断用户是否是有效的
 * @param  [type]  $userName [description]
 * @param  [type]  $userPswd [description]
 * @return boolean           [若用户名和密码有效，返回true；否则返回false]
 */
function isValidUser($userName, $userPswd){
  // 连接数据库
  $db = initDbConnect();
  $sql = "select * from users where u_name = '$userName' and u_pswd = '$userPswd'";
  $r = $db->query($sql);
  // 处理查询结果
  $num_rows = $r->fetchColumn();
  return $num_rows;
}

/**
 * 向users数据表中插入一条记录
 * @param  [type] $userName [用户名]
 * @param  [type] $userPswd [密码]
 * @return [type]           [若插入记录，返回true；否则返回false]
 */
function insertUser($userName, $userPswd){
  // 连接数据库
  $db = initDbConnect();
  // 获取所有留言信息（只考虑msgs表，暂时不考虑rmsgs表）
  $sql = "insert into users(u_name, u_pswd) value('$userName', '$userPswd')";
  return $db->query($sql);
}

function getUserIdByName($u_name){
  // 连接数据库
  $db = initDbConnect();
  $sql = "select * from users where u_name = '$u_name'";
  $r = $db->query($sql);
  $results = $r->fetch(PDO::FETCH_ASSOC);
  return $results['u_id'];
}

/**
 * [insertMsg description]
 * @param  [type] $m_title       [description]
 * @param  [type] $m_content     [description]
 * @param  [type] $loginedUserId [description]
 * @return [type]                [description]
 */
function insertMsg($m_title, $m_content, $loginedUserId){
  // 连接数据库
  $db = initDbConnect();
  // 获取所有留言信息（只考虑msgs表，暂时不考虑rmsgs表）
  $sql = "insert into msgs(msg_title, msg_content, msg_user_id) value('$m_title', '$m_content', '$loginedUserId')";
  return $db->query($sql);
}

/**
 * 修改指定主键ID的留言
 * @param  [type] $m_id      [待修改的留言的主键ID]
 * @param  [type] $m_title   [修改后的留言标题]
 * @param  [type] $m_content [修改后的留言内容]
 * @return [type]            [description]
 */
function updateMsg($m_id, $m_title, $m_content){
  // 连接数据库
  $db = initDbConnect();
  $sql = "update msgs set msg_title = '$m_title',msg_content = '$m_content' where msg_id = '$m_id'";
  return $db->query($sql);
}

/**
 * 删除指定主键id表示的记录
 * @param  [type] $m_id [主键id]
 * @return [type]       [description]
 */
function deleteMsgById($m_id){
  // 连接数据库
  $db = initDbConnect();
  $sql = "delete from msgs where msg_id = '$m_id'";
  $status = $db->query($sql);
  // 若留言表中记录删除成功的话，同时要一并删除回帖表中的记录
  if($status){
    $sql = "delete from rmsgs where r_m_id = '$m_id'";
    return $db->query($sql);
  }
  return false;
}

/**
 * 向rmgs数据表中插入一条记录
 * @param [type] $r_u_id    [回帖发表者主键id]
 * @param [type] $r_m_id    [回帖的原始留言主键id]
 * @param [type] $r_content [回帖内容]
 */
function addRmsgs($r_u_id, $r_m_id, $r_content){
  // 连接数据库
  $db = initDbConnect();
  $sql = "insert into rmsgs(r_u_id, r_m_id, r_content) value('$r_u_id', '$r_m_id', '$r_content')";
  return $db->query($sql);
}

/**
 * 根据留言id，获取当前所拥有的回帖数组
 * @param  [type] $m_id [留言主键ID]
 * @return [array]       [满足条件的二维数组]
 */
function getRmsgsByMid($m_id){
  // 连接数据库
  $db = initDbConnect();
  $sql = "select * from rmsgs, users where rmsgs.r_m_id = $m_id and rmsgs.r_u_id = users.u_id";
  $allMsgs = $db->query($sql);
  // 处理结果集
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
