<?php
  require '../../model/DBPDO.PHP';
  if(isset($_POST["submit"]))
  {
    $data["mahp"] = $_POST["mahp"];
    $data["tenhp"] = $_POST["tenhp"];
    $data["sotc"] = $_POST["sotc"];
    $data["sotietly"] = $_POST["sotietly"];
    $data["so_tiet_th"] = $_POST["so_tiet_th"];
    //print_r($_POST);
    print_r($exp->insert("hocphan",$data));
    echo "<script>"."window.location= '../production/admin_add_hocphan.php' "."</script>";
  }
 ?>
