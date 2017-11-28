<?php include_once 'header.php'; ?>

    <div id="content">
      <!--输入留言板信息到一个列表-->
      <ul>
      <?php
        foreach ($msgs as $row) {
          echo "<li> <a href='#'>". $row['msg_title']."</a>";
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

<?php include_once 'footer.php'; ?>
