<?php
session_start();
if(empty($_SESSION["masv"]))
  header("location:../../login.php");

 ?>
<?php require '../../model/DBPDO.php'; ?>

<?php
  $sql  = "SELECT * FROM sinhvien,lop,nganh,khoa WHERE sinhvien.masv = '{$_SESSION['masv']}' and sinhvien.malop = lop.malop
    and lop.manganh = nganh.manganh and nganh.makhoa = khoa.makhoa";
    $sql2 ="select * from sinhvien";
  $r = $exp->fetch_one($sql);

 ?>
<?php

if(isset($_POST["submit"]))
{
  if($_POST["old-pass"] == $r["password"]){
    if($_POST["new-pass"] == $_POST["c-pass"])
    {
      $data["password"] = $_POST["new-pass"];
      $where = "password = '{$r['password']}'";
      $exp->update("sinhvien",$data,$where);
      echo "<script>"."window.location= '../production/taikhoan.php?id=1' "."</script>";

    }
    else {
      echo "<script>"."window.location= '../production/taikhoan.php?id=2' "."</script>";

    }
  }
  else
    echo "<script>"."window.location= '../production/taikhoan.php?id=3' "."</script>";
}

 ?>
