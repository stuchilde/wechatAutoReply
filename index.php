<?php
$postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
$url = "http://123.206.30.197:8880/wx";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postArr);
$data = curl_exec($ch);
curl_close($ch);
print($data);
