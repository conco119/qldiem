<?php
ob_start();
require '../../model/DBPDO.PHP';
if(isset($_POST["submit"]))
{
  $data["masv"] = $_POST["masv"];
  $data["ngaysinh"] = $_POST["ngaysinh"];
  $data["gioitinh"] = $_POST["gioitinh"];
  $data["diachi"] = $_POST["diachi"];
  $data["sdt"] = $_POST["sdt"];
  $data["email"] = $_POST["email"];
  $where = "masv = '{$_POST['masv']}'";
  $exp->update("sinhvien",$data,$where);
  header("location: ../production/index.php");
}

 ?>
