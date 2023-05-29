<?php require("../../common/check_user.php");?>
<?php require("../../../library/user.php");?>
<?php
$subject="";
$message="";

if(!empty($_POST))
{
	$compose_obj = new user;
	extract($_POST);
	$responce=$compose_obj->compose_message();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php require("common/common_title.php");?></title>
    <?php require("common/head_links.php");?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php require("common/header.php");?>
      
      <?php require("common/left_side_bar.php");?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Compose New Message
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <a href="support_center.php" class="btn btn-primary btn-block margin-bottom">Back to Support Center</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <form action="" method="post" onSubmit="return validate_function()">
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Compose New Message</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group">
                    <input class="form-control"  value="Company" disabled>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="subject" name="subject" placeholder="Subject:">
                  </div>
                  <div class="form-group">
                    <textarea  id="message" name="message" class="form-control" placeholder="Enter Your Message" style="height: 300px"></textarea>
                  </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                  </div>
                  <button  type="reset" class="btn btn-default"><i class="fa fa-times"></i> Cancel</button>
                </div><!-- /.box-footer -->
              </div>
</form><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <?php require("common/footer.php");?>
    </div><!-- ./wrapper -->
<?php require("common/footer_links.php");?>
<script type="text/javascript">
function validate_function()
{	
   function trim(str){				
	 return str.replace(/^\s*|\s*$/g,'');
	}	

	if(trim(document.getElementById('subject').value)==0)
	{
		alert("Please enter subject..!");
		document.getElementById('subject').focus();
		return false;
	}
	if(trim(document.getElementById('message').value)==0)
	{		
		alert("Please enter message... !");
		document.getElementById('message').focus();
		return false;
	}
}

</script>
</body>
  
</html>
