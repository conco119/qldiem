<?php
session_start();
if(empty($_SESSION["magv"]))
  header("location:../../gv.php");

 ?>
<?php require '../../model/DBPDO.php'; ?>

<?php

    $sql2 ="select * from giangvien where magv = '{$_SESSION['magv']}'";
  $r = $exp->fetch_one($sql2);

 ?>

<?php

if(isset($_POST["submit"]))
{
  if($_POST["old-pass"] == $r["password"]){
    if($_POST["new-pass"] == $_POST["c-pass"])
    {
      $data["password"] = $_POST["new-pass"];
      $where = "magv = '{$r['magv']}'";
      $exp->update("giangvien",$data,$where);
      if($_POST['role'] == 2)
        echo "<script>"."window.location= '../production/admin_cpw.php?id=1' "."</script>";
      else
        echo "<script>"."window.location= '../production/gv_cpw.php?id=1' "."</script>";
    }
    else {
      if($_POST['role'] == 2)
        echo "<script>"."window.location= '../production/admin_cpw.php?id=2' "."</script>";
      else
        echo "<script>"."window.location= '../production/gv_cpw.php?id=2' "."</script>";
    }
  }
  else
    if($_POST['role'] == 2)
      echo "<script>"."window.location= '../production/admin_cpw.php?id=3' "."</script>";
    else
      echo "<script>"."window.location= '../production/gv_cpw.php?id=3' "."</script>";    
}

 ?>
