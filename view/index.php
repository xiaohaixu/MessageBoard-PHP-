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
          echo $row['msg_time'];
          if(false != $loginedUser && $loginedUserId == $row['msg_user_id']){ //用户处于登录状态
            // 若当前留言属于当前用户发表的

           echo "<a href='editMsg.php?msg_id={$row['msg_id']}'> 编辑 </a><a href='deleteMsg.php?msg_id={$row['msg_id']}' onclick='return confirm(\'Are you sure?\');>删除</a> </li>";
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
    <?php
      if(@$loginedUser){ // 用户已经登录
        echo "<div id='add_msg'><a href='addMsg.php'>添加留言</a></div>";
      }
    ?>


<?php include_once 'footer.php'; ?>
