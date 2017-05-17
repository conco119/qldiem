<?php
  require '../../model/DBPDO.PHP';
  if(isset($_POST["submit"]))
  {
    $data["mahocky"] = $_POST["mahocky"];
    //print_r($_POST);
    print_r($exp->insert("hocky",$data));
    echo "<script>"."window.location= '../production/admin_add_hocky.php' "."</script>";
  }
 ?>
