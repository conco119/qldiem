<?php

  session_start();
 require 'dbpdo.php';

  if(isset($_POST["submit"]))
  {


      $sql = "SELECT * FROM giangvien where magv='{$_POST['username']}'
        and password='{$_POST['password']}' ";
      if($r=$exp->fetch_one($sql))
        {
          if(isset( $_SESSION['masv']) )
            unset($_SESSION['masv']);
          $_SESSION["magv"] = $r["magv"];
          if($r["role"] == "1")
          {
            echo "<script>"."window.location= '../profile/production/gv_index.php' "."</script>";
            $_SESSION["role"] = "1";
          }
          elseif($r["role"] == "2")
          {
            $_SESSION["role"] = "2";
            echo "<script>"."window.location= '../profile/production/admin_index.php' "."</script>";

          }
        }
        else
          echo "<script>"."window.location= '../gv.php?wrong' "."</script>";


  }

 ?>
