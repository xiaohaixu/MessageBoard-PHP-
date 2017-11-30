<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>简单留言板首页</title>
  </head>
  <body>
    <div id="header">
      <?php
        if(false == $loginedUser){ //用户没有登录系统
            echo "<a href='login.php'>登录</a>|<a href='#'>注册</a> </li>";
        }else{
          echo "Welcome! ".$loginedUser;
          echo "<a href='logout.php'>注销</a>";
        }
       ?>

    </div>
