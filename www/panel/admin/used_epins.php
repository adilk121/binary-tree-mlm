<?php require("../../common/check_admin.php");?>
<?php require("../../../library/admin.php");?>
<?php 
	$fetch_obj = new admin;
	$recieved_epins=$fetch_obj->used_epins_admin();

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
      <h1>Used Epins </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header"> </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="" method="post">
<table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="width:30px;">S.NO</th>
                     <th>EPIN NO.</th>
                     <th>REQUEST NO</th>
					<th>ISSUED TO</th>                   
                    <th>USED BY</th> 
                    <th>DATE OF REQUEST</th>
                    <th>DATE OF ISSUE</th>
                    <th>PRODUCT</th>
                    <th>UNIT PRICE</th>
                    <th>STATUS</th>
                     <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
<?php    

	$x=1;
	while($DATA=$recieved_epins->fetch_assoc())
	{
?>
                  <tr>
                    <td><?php echo $x?></td>
                      <td><?php echo $DATA['epin']?></td>
                      <td>EP-<?php echo $DATA['req_no']?></td>
                     <td><?php echo $DATA['issued_to_username']?> &nbsp;(<?php echo $DATA['isseud_to_did']; ?>) </td>
                    <td><?php echo $DATA['used_by_username']?> &nbsp;(<?php echo $DATA['used_by_did']; ?>)</td>
                    <td><?php echo date(DATE_FORMET, strtotime($DATA['epin_add_date']));?></td>
                     <td><?php echo date(DATE_FORMET, strtotime($DATA['updated_date']));?></td>
                    <td><?php echo $DATA['prd_name']?></td>
                    <td>&#8377;<?php echo $DATA['price']?>/-</td>
                    <td><?php echo $DATA['epin_status']?></td>
                   </tr>
<?php
 $x++;
 	}
?>
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
