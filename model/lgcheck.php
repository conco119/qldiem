<?php

session_start();
ob_start();

 require 'dbpdo.php';

  if(isset($_POST["submit"]))
  {

      // $_POST['username'] = addslashes($_POST['username']);
      // $_POST['password'] = addslashes($_POST['password']);

      $sql = "SELECT * FROM sinhvien where masv='{$_POST['username']}'
        and password='{$_POST['password']}' ";
      if($r=$exp->fetch_one($sql))
        {

          $_SESSION["masv"] = $r["masv"];
          $_SESSION["password"] = $r["password"];
          if(isset( $_SESSION['magv']) )
            unset($_SESSION['magv']);
          if(isset( $_SESSION['role']) )
            unset($_SESSION['role']);
          header("location: ../profile/production");
          // echo "<script>"."window.location= '../profile/production' "."</script>";
        }
        else {

          // echo "<script>"."window.location= '../login.php?wrong' "."</script>";
        }


  }

 ?>
