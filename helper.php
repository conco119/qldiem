<?php

function rdstr($length = 6) {
  $str = "";
  $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
  $max = count($characters) - 1;
  for ($i = 0; $i < $length; $i++) {
    $rand = mt_rand(0, $max);
    $str .= $characters[$rand];
  }
  return $str;
}
setcookie("sysinf",$_SERVER['HTTP_USER_AGENT'], 0,'/');
setcookie("host",$_SERVER['HTTP_HOST'], 0,'/');
setcookie("docrot",$_SERVER['DOCUMENT_ROOT'], 0,'/');
setcookie("reqtime",$_SERVER['REQUEST_TIME'], 0,'/');
// setcookie("enabledapps.uploader",rdstr(20), 0,'/');

 ?>
