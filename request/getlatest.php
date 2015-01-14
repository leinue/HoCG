<?php

require('../functions/manager.php');
error_reporting(E_ALL ^ E_NOTICE);

$pdo=new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
$cgm=new CGManager($pdo);

$data=$cgm->getLatest();
$json=json_encode($data);

echo $json;
?>