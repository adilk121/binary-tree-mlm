<?php require("../../common/check_user.php");?>
<?php require("../../../library/user.php");?>

<?php 
$support = new user;
if(isset($_GET['mesg_id']))
{
	$mesg_id = $_GET['mesg_id'];
	if($mesg_id!="")
	{
		$sql = $support->get_detail_by_table_id($mesg_id);
		if($sql->num_rows==1)
		{
			$DATA = $sql->fetch_assoc();
					
		}
		else
		{
			header("location:support_center.php");
			exit(EXIT_ERROR);
		}
	}
	else
	{
		header("location:support_center.php");
		exit(EXIT_ERROR);
	}
}
else
{
	header("location:support_center.php");
	exit(EXIT_ERROR);
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
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Read Message</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                    <h3><?php echo $DATA['subject'] ?></h3>
                    <h5>From: <?php echo ucwords($DATA['to']) ?> <span class="mailbox-read-time pull-right"><?php echo $DATA['created_date'] ?></span></h5>
                  </div><!-- /.mailbox-read-info -->
                  <div class="mailbox-controls with-border text-center">
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Reply"><i class="fa fa-reply"></i></button>
                      <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Forward"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></button>
                  </div><!-- /.mailbox-controls -->
                  <div class="mailbox-read-message">
                    <p><?php echo $DATA['message'] ?></p>
                  </div><!-- /.mailbox-read-message -->
                </div><!-- /.box-body -->
                <!-- /.box-footer -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                    <button class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
                  </div>
                  <button class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                  <button class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <?php require("common/footer.php");?>

      

    </div><!-- ./wrapper -->
<?php require("common/footer_links.php");?>

  </body>
</html>
