<?php


include("model/DBPDO.php");

if(isset($_POST['submit'])) {
  $data['masv'] = $_POST['masv'];
  $data['cmt'] = $_POST['cmt'];
  $exp->insert("comment",$data);
  header("location: index.php");
}

 ?>
