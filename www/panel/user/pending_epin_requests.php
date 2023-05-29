<?php require("../../common/check_user.php");?>
<?php require("../../../library/user.php");?>
<?php require("../../../library/epins_product.php");?>
<?php 
			$fetch_obj = new user;
			$pending_epins=$fetch_obj->pending_epins();
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
      <h1> Pending Epin Requests </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header"> </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="width:30px;">S.NO</th>
                    <th>REQUEST NO</th>
                    <th>DATE OF REQUEST</th>
                    <th>PRODUCT</th>
                    <th>UNIT PRICE</th>
                    <TH>NO OF EPINS</TH>
                    <TH>TOTAL AMOUNT</TH>
                    <th>MODE</th>
                  </tr>
                </thead>
                <tbody>
<?php 
	 	$x=1;
	  	while($DATA=$pending_epins->fetch_assoc())
		{
			 $total_amount= $DATA['total_epins'] * $DATA['price'];
?>
                  <tr>
                    <td><?php echo $x?></td>
                    <td>EP-<?php echo $DATA['req_no']?></td>
                    <td><?php echo date(DATE_FORMET, strtotime($DATA['created_date']));?></td>
                    <td><?php echo $DATA['name']?></td>
                    <td>&#8377;
                      <?php echo $DATA['price']?>
                      /-</td>
                    <td><?php echo $DATA['total_epins'] ?></td>
                    <td>&#8377;
                     <?php echo $total_amount; ?></td>
                    <td><?php echo $DATA['mode']?></td>
                  </tr>
<?php $x++;}?>
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
