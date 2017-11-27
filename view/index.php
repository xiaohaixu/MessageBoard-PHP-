<?php include_once 'header.php'; ?>

    <div id="content">
      <!--输入留言板信息到一个列表-->
      <ul>
      <?php
        foreach ($msgs as $row) {
          echo "<li> <a href='#'>". $row['msg_title']."</a> <a href='#'>编辑</a> <a href='#'>删除</a> </li>";
        }
       ?>
       </ul>
    </div>

<?php include_once 'footer.php'; ?>
