<?php require '../../model/DBPDO.php'; ?>
<?php
  if(!empty($_GET["id"]))
  {
    $sql = "DELETE FROM giangvien where magv = '{$_GET['id']}'";
    $exp->query($sql);
    echo "<script>"."window.location= '../production/admin_add_giangvien.php' "."</script>";
  }
 ?>
