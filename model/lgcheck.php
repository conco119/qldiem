<?php

  session_start();
 require 'dbpdo.php';

  if(isset($_POST["submit"]))
  {
    if(isset($_POST["who"]) && $_POST["who"] =="sv")
    {
      $sql = "SELECT * FROM sinhvien where masv='{$_POST['username']}'
        and password='{$_POST['password']}' ";
      if($r=$exp->fetch_one($sql))
        {
          $_SESSION["masv"] = $r["masv"];
          echo "Hello {$r['tensv']}";
        }
        else {
          echo "<script>"."window.location= '../login.php?wrong' "."</script>";
        }


      }
      elseif (isset($_POST["who"]) && $_POST["who"] =="sv") {

        $sql = "SELECT * FROM giangvien where magv='{$_POST['username']}'
          and password='{$_POST['password']}' ";
        if($r=$exp->fetch_one($sql))
          {
            $_SESSION["magv"] = $r["magv"];
            echo "Hello {$r['tengv']}";

          }
          else {
            echo "<script>"."window.location= '../login.php?wrong' "."</script>";
          }

      }
      else{
        echo "<script>"."window.location= '../login.php?choose' "."</script>";
      }

  }

 ?>
