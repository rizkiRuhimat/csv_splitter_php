<?php
$filename = $_GET[basename('file')];
unlink('upload/' . DIRECTORY_SEPARATOR . $filename);
header('location:view_list.php');
