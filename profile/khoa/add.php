<?php
  require '../../model/DBPDO.PHP';
  if(isset($_POST["submit"]))
  {
    $data["makhoa"] = $_POST["makhoa"];
    $data["tenkhoa"] = $_POST["tenkhoa"];
      print_r($exp->insert("khoa",$data));
      print_r($_POST);
    echo "<script>"."window.location= '../production/admin_add_khoa.php' "."</script>";
  }
 ?>
