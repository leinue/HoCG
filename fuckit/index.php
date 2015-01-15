<?php
session_start();

if(!$_SESSION){
	header('location:login.form.php');
}else{
	header('location:operate.php');
}
?>
