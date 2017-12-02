<?php include_once 'header.php'; ?>

<div id="content">
  <div>
    <h3>修改留言</h3>
    <form action="" method="post">
      <p>
        留言标题：<input type="text" name="m_title" value="<?php echo $msg['msg_title']; ?>" />
      </p>
      <p>
        留言发表者：<input type="text" name="m_u_id" value="<?php echo $loginedUser;?>" readonly />
      </p>
      <p>
        留言内容：<br />
        <textarea name="m_content"><?php echo $msg['msg_content']; ?></textarea>
      </p>
      <p>
        <input type="submit" value="修改留言" />
      </p>
    </form>
  </div>
</div>

<?php include_once 'footer.php'; ?>
