<?php
ini_set("memory_limit", "-1");
set_time_limit(0);

class splitcsv
{
  function logtofile($user, $what)
  {
    // $log = "/var/log/splitfile.log";
    $log = "splitfile.log";
    $fp = @fopen($log, "a");
    if ($fp) {
      $line  = date("Y-m-d H:i:s") . " ";
      $line .= str_pad($user, 15, " ", STR_PAD_RIGHT) . " ";
      $line .= $what;
      $write = @fwrite($fp, $line . "\n");
      $close = @fclose($fp);
    }
  }

  function fileSize($bytes)
  {
    $bytes = number_format(ceil($bytes / 1024)) . ' KB';
    return $bytes;
  }

  function split()
  {
    global $files;
    $this->logtofile("SYSTEM", "===========================================================================");
    $this->logtofile("SYSTEM", "-------------------------------------------------");
    // $inputDir = '/var/www/splitter/upload/';
    // $backupDir = '/var/www/splitter/backup/';
    $inputDir = 'upload/';
    $backupDir = 'backup/';

    if (count(glob($inputDir . "/*")) === 0) {
      $this->logtofile("SYSTEM", "Folder empty!");
    } else {
      $this->logtofile("FINISH", "SPLIT FILE START");
      $this->logtofile("SYSTEM", "Read incoming directory");
      if ($handle = opendir("$inputDir")) { //open folder,
        while (false != ($filename = readdir($handle))) { //and get all files inside folder
          if ($filename != "." && $filename != "..") { //make exception for '.' and '..' files 
            $this->logtofile("SYSTEM", "File Name: " . $filename);
            $this->logtofile("SYSTEM", "File Size: " . $this->fileSize(filesize($inputDir . $filename)));
            $this->logtofile("START", "===== Start Spliting file: " . $filename . " =====");

            $myFile = "$inputDir" . "$filename";
            $in = file($myFile);
            $counter = 0;
            while ($chunk = array_splice($in, 0, 2500)) { //make a slice to each file
              $filenocsv = str_replace(".csv", "", $filename);
              $files =  $filenocsv . "_" . ++$counter . ".csv";
              $f = fopen($inputDir . $files, "w");
              fputs($f, implode("", $chunk));
              fclose($f);
              $this->logtofile("PROCESS", "file splited name: " . $files);
              $this->logtofile("PROCESS", "file splited size: " . $this->fileSize(filesize($inputDir . $files)));
            }
            rename($myFile, $backupDir . $filename); //move original file to backup folder

            $this->logtofile("SYSTEM", "files " . $filename . " moved to folder backup!");
            $this->logtofile("FINISH", "===== Done Spliting file: " . $filename . ", into " . $counter . " files =====");
          }
        } //end while
        $this->logtofile("FINISH", "SPLIT FILE FINISH");
      }
    }

    $this->logtofile("SYSTEM", "-------------------------------------------------");
  }
}

$exec = new splitcsv();
echo $exec->split();
header('location:http://localhost/splitter/index.php');