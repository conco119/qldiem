<?php
ob_start();
require ('../../model/DBPDO.PHP');

$connect = mysqli_connect($host, $tentaikhoan, $matkhau, $db);
 if(isset($_POST["submit"]))
 {
    echo "dm";
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
      $query = "UPDATE  giangvien SET avatar = '$file' where magv = '{$_POST['magv']}' ";
      mysqli_query($connect, $query);
      if($_POST['role'] == 2)
        header("location: ../production/admin_index.php");
      else
        header("location: ../production/gv_index.php");


 }
 ?>
