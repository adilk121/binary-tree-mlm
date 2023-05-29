<?php require("../../common/check_user.php");?>
<?php require("../../../LIBRARY/user.php");?>
<?php require("../../../LIBRARY/epins_product.php");?>
<?php 
			$fetch_obj = new user;
			$remain_epin=$fetch_obj->show_income_details();
?>
<!DOCTYPE html>
<html>
<head>
<title>
<?php require("common/common_title.php");?>
</title>
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
      <h1> Invoice Detail </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box"> 
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="width:30px;">S.NO</th>
                    <th>Income</th>
                    <th>TDS</th>
                    <th>Admin Charge</th>
                    <th>Amount Payble</th>
                    <th>Payment Mode</th>
                    <th>Payment Date</th>
                    <th>Refrence No.</th>
                    <th>Refrence Date</th>
                    <th>Refrence Bank</th>
                    <th>Refrence Branch</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
	  	$x=1;
	  	while($DATA=$remain_epin->fetch_assoc())
		{
?>
                  <tr>
                    <td><?=$x?></td>
                    <td>&#8377; <?php echo $DATA['income'] ?></td>
                    <td><?php echo $DATA['TDS']?></td>
                    <td><?php echo $DATA['admin_charges'];?></td>
                    <td><?php echo $DATA['amount_payble']?></td>
                    <td><?php echo $DATA['payment_mode']?>/-</td>
                    <td><?php echo $DATA['payment_date']?></td>
                    <td><?php echo $DATA['refrence_no']?></td>
                    <td><?php echo $DATA['refrence_date']?></td>
                    <td><?php echo $DATA['refrence_bank']?></td>
                    <td><?php echo $DATA['refrence_branch']?></td>
                    <td><?php echo $DATA['status']?></td>
                  </tr>
                  <?php $x++; 
		}?>
                </tbody>
                <!--<tfoot>
                      <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                      </tr>
                    </tfoot>-->
              </table>
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
