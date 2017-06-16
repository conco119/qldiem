<?php

  require('../../model/DBPDO.php');
  $data["masv"] = $_POST["masv"];
  $data["mahp"] = $_POST["mahp"];
  $data["magv"] = $_POST["magv"];
  $data["mahocky"] = $_POST["mahocky"];
  $data["diemcc"] = $_POST["diemcc"];
  $data["diemgk"] = $_POST["diemgk"];
  $data["diemth"] = $_POST["diemth"];
  $data["diemkt"] = $_POST["diemkt"];

  $sql = "SELECT * FROM ctbangdiem WHERE masv = '{$data['masv']}' and mahp = '{$data['mahp']}'";
  if($exp->check_exist($sql))
    echo "Môn học đã tồn tại";
  else {
    if($exp->insert2("ctbangdiem",$data))
      echo "Thêm thành công";
    else
      echo "Thêm không thành công";
  }

 ?>
