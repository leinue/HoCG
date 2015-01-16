<?php
header("Content-type: text/html; charset=utf-8");
require('../functions/manager.php');
require('../functions/functions.inc.php');
error_reporting(E_ALL ^ E_NOTICE);

$pdo=new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
$cgm=new CGManager($pdo);

$cgm->setInnerFetchMode(PDO::FETCH_ASSOC);

$result=$cgm->getAll($cgp);
if($result){
	echo json_encode($result);
}else{
	echo '1010';//读取数据库失败
}

?>