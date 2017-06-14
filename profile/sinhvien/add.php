<?php
  require '../../model/DBPDO.PHP';
  if(isset($_POST["submit"]))
  {
    $data["masv"] = $_POST["masv"];
    $data["tensv"] = $_POST["tensv"];
    $data["ngaysinh"] = $_POST["ngaysinh"];
    $data["gioitinh"] = $_POST["gioitinh"];
    $data["diachi"] = $_POST["diachi"];
    $data["email"] = $_POST["email"];
    $data["sdt"] = $_POST["sdt"];
    $data["password"] = $_POST["password"];
    $data["malop"] = $_POST["malop"];
    //print_r($_POST);
    print_r($exp->insert("sinhvien",$data));
    echo "<script>"."window.location= '../production/admin_add_sinhvien.php' "."</script>";
  }
 ?>
