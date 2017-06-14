<?php require 'layout/_header.php'; ?>

<div class="login-page">
<div class="form">

  <form class="login-form" action ="model/lgcheck2.php" method="post">

    <input type="text" placeholder="username" name="username">
    <input type="password" placeholder="password" name="password">
    <button name="submit" type="submit">login</button>

  </form>
  <br>
  <?php if(isset($_GET["wrong"]))
    echo "<p style='color:red'>Tài khoản hoặc mật khẩu không đúng </p>";
   ?>
</div>
</div>
<script src='style/js/jquery.min.js'></script>
<script type="text/javascript">
    document.getElementById('gv').href = "style/gv.css";
</script>
  <script >
  $('.message a').click(function(){
     $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
  });
  </script>
