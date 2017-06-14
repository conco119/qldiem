<?php

  session_start();
 require 'dbpdo.php';

  if(isset($_POST["submit"]))
  {


      $sql = "SELECT * FROM sinhvien where masv='{$_POST['username']}'
        and password='{$_POST['password']}' ";
      if($r=$exp->fetch_one($sql))
        {
          $_SESSION["masv"] = $r["masv"];
          echo "<script>"."window.location= '../profile/production' "."</script>";
        }
        else
          echo "<script>"."window.location= '../login.php?wrong' "."</script>";


  }

 ?>
