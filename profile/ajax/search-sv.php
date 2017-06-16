<?php
require('../../model/DBPDO.php');
if(isset($_POST['masv']))
    {
      $sql = "SELECT * FROM ctbangdiem WHERE masv = '{$_POST['masv']}'";

      $r= $exp->fetch_all($sql);

      foreach ($r as $key => $value) {
          echo "<tr>";
          echo "<td>".$key."</td>";
          echo "<td>".$value['masv']."</td>";
          echo "<td>".$value['mahp']."</td>";
          echo "<td>".$value['mahocky']."</td>";
          echo "<td>".$value['diemcc']."</td>";
          echo "<td>".$value['diemgk']."</td>";
          echo "<td>".$value['diemth']."</td>";
          echo "<td>".$value['diemkt']."</td>";
          echo "<td>".$value['tongket']."</td>";
          echo "<td>".$value['diemchu']."</td>";
          echo "<td>".$value['diemthilai']."</td>";
          echo "<td>".$value['diemct']."</td>";
          echo "<td>"."<a href='../diem/delete.php?masv={$value['masv']}&mahp={$value['mahp']}'>"."<button type='button' name='button' class='btn btn-danger' >"."<i class='fa fa-trash' >"."</i>"."</button>"."</a>"."</td>";
          echo "<td>"."<a>"."<button>"."<i class='' >"."</i>"."</button>"."</a>"."</td>";
          echo "</tr>";

      }

    }
 ?>
