<?php
if(session_status() == PHP_SESSION_NONE) session_start();

$timenow=time();
if(!(isset($_SESSION['logged']) && $_SESSION['logged']=="admin"))
{
session_unset();
session_destroy();
header ("Location: ../../login.php");
}
else if(($timenow-$_SESSION['lastactivity'])>3600)
{
session_unset();
session_destroy();
header ("Location: ../../login.php");
}
else
{
$_SESSION['lastactivity']=time();
}
date_default_timezone_set("Asia/Kolkata");
?>