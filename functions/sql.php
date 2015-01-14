<?php

require('config.php');

function createTable($dbname,$host,$name,$pw){

	$sql=array(
		"hocg_cg"=>"CREATE TABLE `hocg_cg`( 
			`id` int not null auto_increment, 
			`title` text not null,
    		`introduction` text not null,
    		`description` text not null,
    		`tags` text not null,
    		`imgsrc` text not null,
			`publicTime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
			primary key(`id`) )default charset=utf8;");

	$pdo=new PDO("mysql:dbname=$dbname;host=$host",$name,$pw);

	foreach ($sql as $key => $sqlStatement) {
		$res=$pdo->exec($sqlStatement);
		if(!$res){
			print_r($pdo->errorInfo());
		}
	}

}

createTable($dbname,$host,$user,$password);

?>