<?php
  require '../../model/DBPDO.PHP';
  if(isset($_POST["submit"]))
  {
    $data["magv"] = $_POST["magv"];
    $data["tengv"] = $_POST["tengv"];
    $data["ngaysinh"] = $_POST["ngaysinh"];
    $data["gioitinh"] = $_POST["gioitinh"];
    $data["email"] = $_POST["email"];
    $data["password"] = $_POST["password"];
    $data["manganh"] = $_POST["manganh"];
    $data["role"] = $_POST["role"];
    //print_r($_POST);
    print_r($exp->insert("giangvien",$data));
    echo "<script>"."window.location= '../production/admin_add_giangvien.php' "."</script>";
  }
 ?>
