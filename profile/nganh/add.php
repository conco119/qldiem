<?php
  require '../../model/DBPDO.PHP';
  if(isset($_POST["submit"]))
  {
    $data["manganh"] = $_POST["manganh"];
    $data["tennganh"] = $_POST["tennganh"];
    $data["sonamdt"] = $_POST["sonamdt"];
    $data["makhoa"] = $_POST["makhoa"];
    //print_r($_POST);
    print_r($exp->insert("nganh",$data));
    echo "<script>"."window.location= '../production/admin_add_nganh.php' "."</script>";
  }
 ?>
