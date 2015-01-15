<?php
header("Content-type: text/html; charset=utf-8"); 
require('../functions/manager.php');
require('../functions/functions.inc.php');

$user=$_POST['user'];
$pw=$_POST['pw'];

$pdo=new PDO("mysql:dbname=$dbname;host=$host",$name,$pw);
$am=new adminManager($pdo);

$loginResult=$am->login($user,$pw);

if($loginResult){
	echo 'denglu';
}else{
	echo '登录失败<a href="">点此返回</a>';
}
?>