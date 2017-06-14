<?php require '../../model/DBPDO.php'; ?>
<?php
  if(!empty($_GET["id"]))
  {
    $sql = "DELETE FROM lop where malop = '{$_GET['id']}'";
    $exp->query($sql);
    echo "<script>"."window.location= '../production/admin_add_lop.php' "."</script>";
  }
 ?>
