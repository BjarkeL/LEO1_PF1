<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Content-type:application/json");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "cntnr2:8080");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

$array = preg_split("/\s+/", $output);

array_shift($array);
echo json_encode($array);

?>
