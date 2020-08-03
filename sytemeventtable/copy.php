<?php
$oldlen= $_GET['length'];
$f = fopen("copy.csv", "r");
$fr = fread($f, filesize("copy.csv"));
fclose($f);
$lines = array();
$lines = explode("\n",$fr); // IMPORTANT the delimiter here just the "new line" \r\n, use what u need instead of...
$cells = array();
$newlen= count($lines)-1;
$send=array();
for($i=$newlen-1;$i>=$oldlen;$i--){
    array_push($send,explode(",",$lines[$i]));
}

echo json_encode($send);