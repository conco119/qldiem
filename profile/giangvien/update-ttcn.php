<?php
ob_start();
require '../../model/DBPDO.PHP';
if(isset($_POST["submit"]))
{
  //$data["magv"] = $_POST["magv"];
  $data["ngaysinh"] = $_POST["ngaysinh"];
  $data["gioitinh"] = $_POST["gioitinh"];
  $data["email"] = $_POST["email"];
  $where = "magv = '{$_POST['magv']}'";
  $exp->update("giangvien",$data,$where);
  header("location: ../production/admin_index.php");

}

 ?>
