<?php
session_start();

if($_SESSION){
	require('../../functions/manager.php');
	require('../../functions/functions.inc.php');
  	$pdo=new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
	$cgm=new CGManager($pdo);

	$title=$_GET['title'];
	$introduction=$_GET['intro'];
	$description=$_GET['desc'];
	$imgsrc=$_GET['imgsrc'];
	$tags=$_GET['tags'];

	if(strlen($title)!=0 && strlen($introduction)!=0 && strlen($introduction)!=0 && strlen($imgsrc)!=0 && strlen($tags)!=0){
		if($cgm->insert($title,$introduction,$description,$tags,$imgsrc)){
			echo '1003';//插入新CG成功
		}else{
			echo '1004';//插入新CG失败
		}
	}else{
		echo '1005';//有空数据
	}
}else{
	echo '1000';//未登录或登录失败
}

?>