<?php
header("Content-type: text/html; charset=utf-8"); 
require('../functions/manager.php');
require('../functions/functions.inc.php');

session_start();

if(!$_SESSION){
	$user=test_input($_POST['user']);
	$pw=test_input($_POST['pw']);

	$pdo=new PDO("mysql:dbname=$dbname;host=$host",$name,$pw);
	$am=new adminManager($pdo);

	$loginResult=$am->login($user,$pw);

	if($loginResult){
		$_SESSION['admin']=$loginResult[0]->getName();
		echo '1001';//登录成功
	}else{
		echo '1000';//登录失败
	}
}else{
	echo '1002';//已登录
}

?>