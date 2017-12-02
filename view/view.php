<?php include_once 'header.php'; ?>

    <div id="content">
      <h3>
        <?php echo $msg['msg_title']; ?>
      </h3>
      <div>
        作者：<?php echo $msg['u_name']; ?>
        &nbsp;&nbsp;
        发表时间：<?php echo $msg['msg_time']; ?>
      </div>
      <div>
        <br />
        内容：<br />
        <?php echo $msg['msg_content']; ?>
      </div>

      <div>
        <form action="" method="post">
          <input type="hidden" name="r_m_id" value="<?php echo $mid; ?>" />
          <input type="hidden" name="r_u_id" value="<?php echo $r_u_id; ?>" />
          <p>回帖标题：<input type="text" name="r_title"></p>
          <p>回帖内容：<textarea name="r_content"></textarea></p>
          <p><input type="submit" value="回复" /></p>
        </form>

      </div>
    </div>

<?php include_once 'footer.php'; ?>
