<?php
  require('../../model/DBPDO.php');
  if(isset($_POST['malop'])){
    $sql = "SELECT * FROM sinhvien WHERE malop = '{$_POST['malop']}'";
    $r = $exp->fetch_all($sql);
    echo "<option selected hidden> Chọn </option> ";
    foreach ($r as $key => $value) {
      echo "<option value='{$value['masv']}'>{$value['tensv']}</option>";
    }

  }
  //echo var_dump($r);
 ?>
