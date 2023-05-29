<?php
require_once(dirname(__DIR__)."../../../library/constant.php");
ob_start();
session_destroy();
header("Location:../../login.php");
?>