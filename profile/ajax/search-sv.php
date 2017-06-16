<?php
require('../../model/DBPDO.php');
if(isset($_POST['masv']))
    {
      $sql = "SELECT * FROM ctbangdiem,hocphan WHERE masv = '{$_POST['masv']}' and ctbangdiem.mahp = hocphan.mahp ";

      $r= $exp->fetch_all($sql);

      foreach ($r as $key => $value) {
          echo "<tr>";
          echo "<td>".$key."</td>";
          echo "<td>".$value['masv']."</td>";
          echo "<td>".$value['mahp']."</td>";
          echo "<td>".$value['tenhp']."</td>";
          echo "<td>".$value['diemcc']."</td>";
          echo "<td>".$value['diemgk']."</td>";
          echo "<td>".$value['diemkt']."</td>";
          echo "<td>".$value['tongket']."</td>";
          echo "<td>".$value['diemchu']."</td>";
          echo "<td>".$value['diemthilai']."</td>";
          echo "<td>".$value['diemct']."</td>";
          echo "<td>"."<a href='../diem/delete.php?masv={$value['masv']}&mahp={$value['mahp']}' onclick='return confirm(\"Có chắc chắn xóa\")' >"."<button type='button' name='button' class='btn btn-danger' >"."<i class='fa fa-trash' >"."</i>"."</button>"."</a>"."</td>";
          echo "<td>"."<a href='../diem/edit.php?masv={$value['masv']}&mahp={$value['mahp']}'  >"."<button type='button' name='button' class='btn btn-primary' >"."<i class='fa fa-wrench' >"."</i>"."</button>"."</a>"."</td>";
          echo "</tr>";

      }

    }
 ?>
