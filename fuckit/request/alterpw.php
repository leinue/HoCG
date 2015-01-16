<?php 

session_start();

if($_SESSION){
	require('../../functions/manager.php');
	require('../../functions/functions.inc.php');
  	$pdo=new PDO("mysql:dbname=$dbname;host=$host",$user,$password);
	$am=new adminManager($pdo);

	$old=$_GET['old'];
	$newpw=$_GET['newpw'];

	if(strlen($old)!=0 && strlen($newpw)!=0){
		if($am->updatePw("fuckme",$old,$newpw)){
			echo '1006';//修改密码成功
		}else{
			echo '1007';//修改密码失败
		}
	}else{
		echo '1005';//有空数据
	}

}else{
	echo '1000';//未登录或登录失败
}

?>