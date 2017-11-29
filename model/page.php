<?php
// 分页相关的函数库
/**
 * 生成分页码并返回
 * @param  [type] $url         [分页码中超链接URL的基地址]
 * @param  [type] $currentPage [当前的页码数]
 * @param  [type] $pageCount   [总页码数]
 * @return [String]              [当前分页码的html代码]
 */

function createPage($url, $currentPage, $pageCount) {
  // "上一页"和“下一页”
  $lastPage = $currentPage - 1;
  if ($lastPage < 1) {
    $lastPage = 1;
  }
  $nextPage = $currentPage + 1;
  if ($nextPage > $pageCount) {
    $nextPage = $pageCount;
  }
  $html = '<ul>';
  // 处理“首页”
  $html .= "<li><a href = '{$url}?page=1'>首页</a></li>";
  // 处理“上一页”
  $html .= "<li><a href = '{$url}?page={$lastPage}'>上一页</a></li>";
  // 处理“当前页”
  $html .= "<li>$currentPage</li>";
  // 处理“下一页”
  $html .= "<li><a href = '{$url}?page={$nextPage}'>下一页</a></li>";
  // 处理“末页”
  $html .= "<li><a href = '{$url}?page={$pageCount}'>末页</a></li>";
  $html .= '</ul>';
  // 返回
  return $html;
}
?>
