<?php 
if(session_status() == PHP_SESSION_NONE) session_start();
if(isset($_GET['msg']))
{
	$_SESSION['msg'] = $_GET['msg'];
}
if(isset($_GET['q']))
{
	header("location:".$_GET['q']);
}
?>