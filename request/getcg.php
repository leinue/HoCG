<?php
header("Content-type: text/html; charset=utf-8");
require('../functions/manager.php');
require('../functions/functions.inc.php');
error_reporting(E_ALL ^ E_NOTICE);

$cgp=test_input($_GET['p']);

if(strlen($cgp)!=0){
	$pdo=new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
	$cgm=new CGManager($pdo);

	$result=$cgm->get($cgp);
	if($result){
		print_r(json_encode($result));
	}else{
		echo '1010';//读取数据库失败
	}
}else{
	echo '1005';//有空数据
}




?>