<?php include_once 'header.php'; ?>
<style type="text/css">
  #page ul {
    overflow: hidden;
  }
  #page ul li {
    float: left;
    list-style: none;
    margin-right: 20px;
  }
</style>
    <div id="content">
      <!--输入留言板信息到一个列表-->
      <ul>
      <?php
        foreach ($msgs as $row) {
          echo "<li> <a href='view.php?msg_id={$row['msg_id']}'>". $row['msg_title']."</a>";
          if(false != $loginedUser){ //用户处于登录状态
            // 若当前留言属于当前用户发表的
            echo "<a href='#'>编辑</a><a href='#'>删除</a> </li>";
          }else{ //没有用户处于登录状态
            echo "</li>";
          }
        }
       ?>
       </ul>
    </div>
    <div id="page">
      <?php
        echo createPage($_SERVER['PHP_SELF'], $currentPage, $pageCount);
       ?>
    </div>

<?php include_once 'footer.php'; ?>
