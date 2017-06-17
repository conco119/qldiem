<?php require '../../model/DBPDO.php'; ?>
<?php
  if(!empty($_GET["id"]))
  {
    $sql = "DELETE FROM `hocphan` WHERE `hocphan`.`mahp` = '{$_GET['id']}'";
    echo $sql;
    $exp->query($sql);
    //echo $_GET["id"];
     echo "<script>"."window.location= '../production/admin_add_hocphan.php' "."</script>";
  }
 ?>
