<?php
  require '../../model/DBPDO.PHP';
  if(isset($_POST["submit"]))
  {
    $data["malop"] = $_POST["malop"];
    $data["tenlop"] = $_POST["tenlop"];
    $data["namnhaphoc"] = $_POST["namnhaphoc"];
    $data["manganh"] = $_POST["manganh"];
    //print_r($_POST);
    print_r($exp->insert("lop",$data));
    echo "<script>"."window.location= '../production/admin_add_lop.php' "."</script>";
  }
 ?>
