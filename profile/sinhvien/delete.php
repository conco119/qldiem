<?php require '../../model/DBPDO.php'; ?>
<?php
  if(!empty($_GET["id"]))
  {
    $sql = "DELETE FROM sinhvien where masv = '{$_GET['id']}'";
    $exp->query($sql);
    echo "<script>"."window.location= '../production/admin_add_sinhvien.php' "."</script>";
  }
 ?>
