<?php
$filename = $_GET[basename('file')];
// var_dump($filename);
// die;
unlink('upload/' . DIRECTORY_SEPARATOR . $filename);
header('location:view_list.php');