<?php
session_start();

if($_SESSION){
	require('../../functions/manager.php');
	require('../../functions/functions.inc.php');
  	$pdo=new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
	$cgm=new CGManager($pdo);

	$id=$_GET['id'];

	if(strlen($id)!=0){
		if($cgm->delete($id)){
			echo '1008';//删除CG成功
		}else{
			echo '1009';//删除CG失败
		}
	}else{
		echo '1005';//有空数据
	}
}else{
	echo '1000';//未登录或登录失败
}

?>