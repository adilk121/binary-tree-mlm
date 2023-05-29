<?php session_start();?>
<?php require_once("../library/error_msg.php");?>
<?php require_once("common/login.php");?>
<?php
//echo password_hash("admin",PASSWORD_DEFAULT);
if(isset($_POST['submit_form']))
{
	if((!isset($_POST['login_username'])) || (!isset($_POST['login_username'])) || (!isset($_POST['login_captcha'])))
	{
		$msg="";
	}
	else if($_SESSION["code"]!=$_POST['login_captcha'])
	{
		$msg = "Incorrect Security Code...!!!";
	}
	else
	{
		$login_obj=new check_login();
		$msg=$login_obj->db_login_check($_POST['login_username'],$_POST['login_password']);
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="panel/admin/bootstrap/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="panel/admin/font-awesome/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="panel/admin/dist/css/AdminLTE.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">



    <div class="login-box">
      <div class="login-logo">
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg"><strong>Sign in to start your session</strong></p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Email ID" name="login_username" autocomplete="off" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="login_password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
          	<div class="col-md-12">
            	<img src="captcha.php" alt="Captcha" />
            </div>
          </div>
          <div class="row" style="margin-top:10px;">
          	<div class="col-md-12">
<input name="login_captcha" id="login_security_captcha"  autosuggest="off" placeholder="  Enter Security Code" autocomplete="off" type="text" style="font-size:1.1em; width:150px; height:35px;" required maxlength="4" />
            </div>
          </div>
          <div class="row">
            <div class="col-xs-8">
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" name="submit_form" class="btn btn-danger btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="panel/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="panel/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
