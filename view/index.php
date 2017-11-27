<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>简单留言板首页</title>
  </head>
  <body>

    <div id="header">
      <!--用户没有登录系统-->
      <a href="#">登录</a>
      <a href="#">注册</a>
    </div>

    <div id="content">
      <!--输入留言板信息到一个列表-->
      <ul>
      <?php
        foreach ($msgs as $row) {
          echo "<li> <a href='#''>". $row['msg_title']."</a> </li>";
        }
       ?>
       </ul>
    </div>

    <div id="footer">
      <hr />
      &copy; PHP开发者
    </div>

  </body>
</html>
