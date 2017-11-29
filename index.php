<?php

// 设置公有常量
define('APP_PATH', realpath(__DIR__)); // 当前应用程序目录
// 加载分页相关配置
$pageConfig = require_once 'config/page.php';
// 加载函数库
require_once 'model/db.php';
require_once 'model/user.php';
require_once 'model/page.php'; //分页码相关函数库
// 获取当前页码
if(isset($_GET[$pageConfig['page_params']])){
  $currentPage = $_GET[$pageConfig['page_params']];
} else {
  $currentPage = 1;
}

// 当前页码的健壮性考虑
// 当前页码至少要大于0
if($currentPage <= 0){
  $currentPage = 1;
}
// 当前页码不能大于总页码（总页码：数据总记录个数 / 每一页显示的记录个数）
$pageCount = ceil(getMsgsCount() / $pageConfig['page_size']);
if($currentPage > $pageCount){
  $currentPage = $pageCount;
}



// 获取当前登录的用户名
$loginedUser = getLoignedUser();

//获取所有留言信息
$msgs = getMsgsByPageNumber($currentPage, $pageConfig['page_size']);
// 显示视图文件
include_once 'view/index.php';
?>
