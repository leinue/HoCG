<?php
header("Content-type: text/html; charset=utf-8");
require('../functions/manager.php');
require('../functions/functions.inc.php');
error_reporting(E_ALL ^ E_NOTICE);

$pdo=new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
$cgm=new CGManager($pdo);

$page=test_input($_GET['page']);
$pageAmount=$cgm->getAmount();

$cgm->setInnerFetchMode(PDO::FETCH_ASSOC);

if($page==NULL || (!(is_numeric($page))) || $page>$pageAmount){
	$page='0';
}

$result=$cgm->getPartCG($page,$page+10);
if($result){
	echo $pageAmount."[PAGEAMOUNT]".json_encode($result);
}else{
	echo '1010';//读取数据库失败
}

?>