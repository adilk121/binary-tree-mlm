<?php require("../../common/check_admin.php");?>
<?php require("../../../library/admin.php");?>
<?php 
if(isset($_GET['action']))
{
	if($_GET['action']!='')
	{
		$action = $_GET['action'];
	if(($action!='change_password')&&($action!='edit_profile')&&($action!='view_downline_chart')&&($action!='view_downline_list'))
		{
			header("location:index.php");
			exit(EXIT_ERROR);
		}
	}
	else
	{
		header("location:index.php");
		exit(EXIT_ERROR);
	}
}
else
{
	header("location:index.php");
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
	if(trim(document.getElementById('user_value').value)==0)
	{
		alert("Please enter username..!");
		document.getElementById('user_value').focus();
		return false;
	}
}
</script>
				<body class="hold-transition skin-blue sidebar-mini" onLoad=" return focus_user_value()">	
				<div class="wrapper">
		<?php require("common/header.php");?>
					<?php require("common/left_side_bar.php");?>
					
					<!-- Content Wrapper. Contains page content -->
					<div class="content-wrapper"> 
						<!-- Content Header (Page header) -->
						<section class="content-header">
							<h1> <?php if(($action=='change_password')){ ?> Change Password <?php }elseif($action=='edit_profile'){ ?> Edit Profile <?php }elseif($action=='view_downline_chart'){?> View Downline Chart <?php }elseif($action=='view_downline_list'){?> View Downline List <?php }?></h1>
						</section>
						
						<!-- Main content -->
						<section class="content">
							<div class="row">
								<div class="col-xs-12">
									<div class="box">
										<div class="box-body" style="padding:50px 0;">
											<form action="<?php echo $action .".php"?>" method="get" onSubmit="return validate_function()"> 
											<div class="row">
											<div class="col-md-3">
                                 
											<div class="col-md-12">
                                  <input type="text" class="form-control" id="user_value" name="user_value" placeholder=" Please Enter Username" >
                                  </div>
                                  <div class="col-md-12" style="margin-top:5px;">
                              
                                  <input type="submit" value="Submit" class="btn btn-success pull-right">
                                  
                                     
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
		  