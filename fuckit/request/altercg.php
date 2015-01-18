<?php
session_start();

if($_SESSION){
	require('../../functions/manager.php');
	require('../../functions/functions.inc.php');
  	$pdo=new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
	$cgm=new CGManager($pdo);

	$id=$_GET['id'];
	$title=$_GET['title'];
	$introduction=$_GET['intro'];
	$description=$_GET['desc'];
	$imgsrc=$_GET['imgsrc'];
	$tags=$_GET['tags'];
	$publicTime=$_GET['publictime'];

	if(strlen($id)!=0 && strlen($title)!=0 && strlen($introduction)!=0 && strlen($description)!=0 && strlen($imgsrc)!=0 && strlen($tags)!=0 && strlen($publicTime)!=0){
		if($cgm->update($id,$title,$introduction,$description,$tags,$imgsrc,$publicTime)){
			echo '1011';//更新CG成功
		}else{
			echo '1012';//更新CG失败
		}
	}else{
		echo '1005';//有空数据
	}
}else{
	echo '1000';//未登录或登录失败
}

?>