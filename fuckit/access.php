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

/*  Dim red As Color
  
  red = RGB(0, 0, 0, 50)
  g.ForeColor = red
  g.FillRect(20, 20,100, 100)
  g.FillOval(150,120,100,100)
  g.FillRoundRect(270,200,100,100,4)
  Dim points() As Integer 
  points = Array(20, 200, 50,100, 50, 100,100) 
  g.FillPolygon(points)
  
  dim x as Integer
  dim xStep As Integer
  
  x=20
  xStep=50
  
  g.DrawLine(x,x-xStep,x+xStep,x+xStep)
  g.DrawLine(x-xStep,x+xStep,x,x-xStep)
  g.DrawLine(x-xStep,x+xStep,x,x+xStep)
  g.DrawLine(x+xStep,x+xStep,x,x+xStep)*/

?>