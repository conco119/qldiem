<?php require '../../model/DBPDO.php'; ?>
<?php

    $sql = "DELETE FROM `ctbangdiem` WHERE masv = '{$_GET['masv']}' and mahp='{$_GET['mahp']}'  ";
    $exp->query($sql);

     echo "<script>"."window.location= '../production/gv_nhapdiem.php' "."</script>";

 ?>
