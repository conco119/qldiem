<?php
  require('../../model/DBPDO.php');
  if(isset($_POST['manganh'])){
    $sql = "SELECT * FROM lop WHERE manganh = '{$_POST['manganh']}'";
    $r = $exp->fetch_all($sql);
    echo "<option selected hidden> Chọn </option> ";
    foreach ($r as $key => $value) {
      echo "<option value='{$value['malop']}'>{$value['tenlop']}</option>";
    }

  }
  //echo var_dump($r);
 ?>
