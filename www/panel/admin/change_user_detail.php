<?php require("../../common/check_admin.php");?>
<?php require("../../../LIBRARY/admin.php");?>
<?php 
if(isset($_GET['action']))
{
	if($_GET['action']!='')
	{
		if(($_GET['action']!='change_password')&&($_GET['action']!='edit_profile')&&($_GET['action']!='view_downline_chart')&&($_GET['action']!='view_downline_list'))
		{
			header("location:change_user_detail.php");
			exit(EXIT_ERROR);
		}
	}
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
</script>
				<body class="hold-transition skin-blue sidebar-mini" onLoad=" return focus_user_value()">	
				<div class="wrapper">
		<?php require("common/header.php");?>
					<?php require("common/left_side_bar.php");?>
					
					<!-- Content Wrapper. Contains page content -->
					<div class="content-wrapper"> 
						<!-- Content Header (Page header) -->
						<section class="content-header">
							<h1> Used Epins </h1>
						</section>
						
						<!-- Main content -->
						<section class="content">
							<div class="row">
								<div class="col-xs-12">
									<div class="box">
										<div class="box-body">
											<form action="<?php echo $action .".php"?>" method="post">
												<table id="example2" class="table table-bordered table-hover">
													<input type="text" style="margin-left:500px; height:29px; width:200px;" id="user_value">
													&nbsp;
													<input type="submit" style="height:28px; vertical-align:central">
												</table>
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
		  