<?php


if ($_FILES["upload"]["error"] > 0) {
  echo "Error: " . $_FILES["upload"]["error"] . "<br>";
} else {
  $upload_dir = "upload/";
  // $download_dir = "/var/www/splitter/download/";
  $lead_file = $_FILES["upload"]["name"];

  echo "Upload: " . $_FILES["upload"]["name"] . "<br>";
  echo "Type: " . $_FILES["upload"]["type"] . "<br>";
  echo "Size: " . ($_FILES["upload"]["size"] / 1024) . " kB<br>";
  move_uploaded_file($_FILES["upload"]["tmp_name"], $upload_dir . $_FILES["upload"]["name"]);
  echo "Stored in: " . $_FILES["upload"]["tmp_name"] . " - \n";
  include 'split_csv.php';
}