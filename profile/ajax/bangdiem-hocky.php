<?php
require('../../model/DBPDO.php');
$sql = "SELECT * FROM ctbangdiem,hocphan WHERE mahocky= '{$_POST['mahocky']}' and masv='{$_POST['masv']}' and ctbangdiem.mahp = hocphan.mahp";
if($_POST['mahocky'] =='all')
{
  $sql = "SELECT * FROM ctbangdiem,hocphan WHERE  masv='{$_POST['masv']}' and ctbangdiem.mahp = hocphan.mahp";

}
$r=$exp->fetch_all($sql);


foreach ($r as $key => $value) {
    echo "<tr>";
    echo "<td>".$key."</td>";
    echo "<td>".$value['mahp']."</td>";
    echo "<td>".$value['tenhp']."</td>";
    echo "<td>".$value['mahocky']."</td>";
    echo "<td>";
      if($value['diemchu'] != "F")
            echo "Đạt";
          else {
            echo "Không đạt";
          }

    echo "</td>";
    echo "<td>".$value['sotc']."</td>";
    echo "<td>".$value['diemcc']."</td>";
    echo "<td>".$value['diemgk']."</td>";
    echo "<td>".$value['diemkt']."</td>";
    echo "<td>".$value['tongket']."</td>";
    echo "<td>".$value['diemchu']."</td>";
    echo "<td>".$value['diemthilai']."</td>";
    echo "<td>".$value['diemct']."</td>";
    echo "</tr>";

}

 ?>
