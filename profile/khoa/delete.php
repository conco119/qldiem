<?php require '../../model/DBPDO.php'; ?>
<?php
  if(!empty($_GET["id"]))
  {
    $sql = "DELETE  FROM khoa where makhoa = '{$_GET['id']}'";
    $exp->query($sql);
    echo "<script>"."window.location= '../production/admin_add_khoa.php' "."</script>";
  }
 ?>
