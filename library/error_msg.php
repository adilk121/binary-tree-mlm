<?php 
$msg="";
if(isset($_SESSION['msg']))
{
	$msg = $_SESSION['msg'];
	unset($_SESSION['msg']);
}

?>
