<?php require("../../common/check_admin.php");?>
<?php require("../../../library/admin.php");?>
<?php 

$fetch_obj = new admin;
if(isset($_GET['user_value']))
{
	if($_GET['user_value']!='')
	{
		$username = $_GET['user_value'];
		if(filter_var($username,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>USERNAME_VALIDATE))))
		{
				header("location:select_user_detail.php?action=change_password");
				exit(EXIT_ERROR);
		}

	}
	else
	{
		header("location:select_user_detail.php?action=change_password");
		exit(EXIT_ERROR);
	}
}
else
{
	header("location:select_user_detail.php?action=change_password");
	exit(EXIT_ERROR);
}
if(isset($_POST['change_pass']))
{
	$_POST['new_pass'];
 	$fetch_obj->change_paasword($username,$_POST['new_pass']);		
}
		$username = $fetch_obj->fetch_password($username);
		if($username->num_rows==1)
		{
			$detail = $username->fetch_assoc();
		}
		else
		{
			header("location:select_user_detail.php?action=change_password");
			exit(EXIT_ERROR);

		}


?>
  <!DOCTYPE html>
<html>
<head>
<title>
<?php require("common/common_title.php");?>
</title>
<?php require("common/head_links.php");?>
</head>
<script>
function focus_user_value()
{
document.getElementById("user_value").focus();
}
function validate_function(){	
   function trim(str){				
	 return str.replace(/^\s*|\s*$/g,'');
	}	
	if(trim(document.getElementById('new_pass').value)==0)
	{
		alert("Please enter new password..!");
		document.getElementById('new_pass').focus();
		return false;
	}
}
</script>

<body class="hold-transition skin-blue sidebar-mini" >
<div class="wrapper">
<?php require("common/header.php");?>
<?php require("common/left_side_bar.php");?>
          
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper"> 
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1> Change Password </h1>
            </section>
            
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-body" style="padding:50px 0;">
                      <form action="" method="post" onSubmit="return validate_function()"> 
											<div class="row">
											<div class="col-md-3">
                                 
											<div class="col-md-12">
                                  <input type="text" class="form-control" value="<?php echo $detail['password']?>" disabled>
                                  </div>

                                  <div class="col-md-12">
                                  <input type="text" class="form-control" id="new_pass" name="new_pass" placeholder=" Please Enter New Password" >
                                  </div>
                                  <div class="col-md-12" style="margin-top:5px;">
                              <input type="button" value="Cancel" class="btn btn-danger pull-right" onClick="window.location='select_user_detail.php?action=change_password'">
                                  <input type="submit" name="change_pass" value="Change Password" class="btn btn-success pull-right" style="margin-right:15px;"> 
                                 </div>
										</div>
											</form>
                    </div>
                    <!-- /.box-body --> 
                  </div>
                  <!-- /.box --> 
                </div>
                <!-- /.col --> 
              </div>
              <!-- /.row --> 
            </section>
            <!-- /.content --> 
          </div>
          <!-- /.content-wrapper -->
          
          <?php require("common/footer.php");?>
        </div>
        <!-- ./wrapper -->
        <?php require("common/footer_links.php");?>
        </body>
        </html>
		  