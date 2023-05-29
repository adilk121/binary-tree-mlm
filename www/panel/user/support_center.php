<?php require("../../common/check_user.php");?>
<?php require("../../../library/user.php");?>
<?php 
$support = new user;
$sql = $support->support_center();

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
            Support Center
            <small>3 new messages</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <a href="compose_message.php" class="btn btn-primary btn-block margin-bottom">Compose</a>
              <div class="box box-solid col-md-3">
                <div class="box-header with-border">
                  <h3 class="box-title">Folders</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right">12</span></a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Inbox</h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" class="form-control input-sm" placeholder="Search Mail">
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                      1-50/200
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                      <tbody>
                    <?php while($DATA= $sql->fetch_assoc())
						  		  {
							?>
                        <tr>
                          <td><input type="checkbox"></td>
                          
                          <td class="mailbox-name"><a href="read_message.php?mesg_id=<?php echo $DATA['table_id'] ?>"><?php echo ucwords($DATA['to']) ?></a></td>
                          <td class="mailbox-subject"><b><?php echo $DATA['subject'] ?></b> - <?php echo substr($DATA['message'],0,100) ?>...</td>
                          <td class="mailbox-date"><?php echo $DATA['created_date'] ?></td>
                        </tr>
                   <?php 
						 		 }
						 ?>
                        
                        
                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                      1-50/200
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                </div>
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
