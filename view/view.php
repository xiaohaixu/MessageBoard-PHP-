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
    </div>

<?php include_once 'footer.php'; ?>
