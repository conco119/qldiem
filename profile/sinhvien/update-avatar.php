<?php
ob_start();
  // require '../../model/DBPDO.PHP';
  // if(isset($_POST["submit"]))
  // {
  //   $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  //   $data["avatar"] = $file;
  //   $where="masv = '{$_POST['masv']}'";
  //   echo $exp->update("sinhvien",$data,$where);
  // }
require ('../../model/DBPDO.PHP');
  $connect = mysqli_connect($host, $tentaikhoan, $matkhau, $db);
   if(isset($_POST["submit"]))
   {
      echo "dm";
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $query = "UPDATE  sinhvien SET avatar = '$file' where masv = '{$_POST['masv']}' ";
        mysqli_query($connect, $query);

        header("location:../production/index.php");
   }
 ?>
