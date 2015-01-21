<?php
header("Content-type: text/html; charset=utf-8"); 
require('../functions/manager.php');
require('../functions/functions.inc.php');

session_start();

if(!$_SESSION){
	$username=test_input($_POST['user']);
	$pw=test_input($_POST['pw']);

	$pdo=new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
	$am=new adminManager($pdo);

	$loginResult=$am->login($username,$pw);

	if($loginResult){
		$_SESSION['admin']=$loginResult[0]->getName();
		header("location:index.php");
	}else{
		echo '1000';//登录失败
	}
}else{
	echo '1002';//已登录
}

?>