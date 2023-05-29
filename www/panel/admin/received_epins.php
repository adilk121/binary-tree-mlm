<?php require("../../common/check_admin.php");?>
<?php require("../../../library/admin.php");?>
<?php 
	$fetch_obj = new admin;
	if(isset($_POST['to_delete']))
	{
		if($_POST['to_delete']!="")
		{
			 $delete_epins = $fetch_obj->delete_epins($_POST['to_delete']);
		
		}
	}
	if(isset($_POST['to_issue']))
	{
		if($_POST['to_issue']!="")
		{
			
			$issue_epins = $fetch_obj->issue_epins($_POST['to_issue']);
		}
	}

		$recieved_epins=$fetch_obj->recieved_epins();

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
      <h1> Received Epin Requests </h1>
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
					<th>SENT BY</th>
                    <th>REQUEST NO</th>
                    <th>DATE OF REQUEST</th>
                    <th>PRODUCT</th>
                    <th>UNIT PRICE</th>
                    <TH>NO OF EPINS</TH>
                    <TH>TOTAL AMOUNT</TH>
                    <th>MODE</th>
                     <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
<?php    

	$x=1;
	while($DATA=$recieved_epins->fetch_assoc())
	{
		 $total_amount= $DATA['total_epins'] * $DATA['price'];
?>
                  <tr>
                    <td><?php echo $x?></td>
                     <td><?php echo $DATA['username']?> &nbsp;(<?php echo $DATA['did']; ?>)</td>
                    <td>EP-<?php echo $DATA['req_no']?></td>
                    <td><?php echo date(DATE_FORMET, strtotime($DATA['epin_add_date']));?></td>
                    <td><?php echo $DATA['prd_name']?></td>
                    <td>&#8377;
                      <?php echo $DATA['price']?>
                      /-</td>
                    <td><?php echo $DATA['total_epins'] ?></td>
                    <td>&#8377;
                     <?php echo $total_amount; ?></td>
                    <td><b><?php echo strtoupper($DATA['mode']) ?></b>
					<?php if($DATA['mode']=='cheque')
					{ ?>
                    <?php echo "<br>"; ?>
                  <b>Cheque No.</b>  (<?php echo $DATA['cheque_no']?>)
                  <?php echo "<br>"; ?>
                 <b>Cheque Date.</b>  (<?php echo $DATA['cheque_date']?>)
                    <?php echo "<br>"; ?>
                 <b>Cheque Bank.</b> (<?php echo $DATA['cheque_bank']?>)
                    <?php echo "<br>"; ?>
                 <b>Cheque Branch</b>  (<?php echo $DATA['cheque_branch']?>)
					<?php
					}
					elseif($DATA['mode']=='dd')
				 	{ ?>
				 <?php echo "<br>"; ?>
                  <b>DD No.</b>  (<?php echo $DATA['dd_no']?>)
                  <?php echo "<br>"; ?>
                 <b>DD Date.</b>  (<?php echo $DATA['dd_date']?>)
                    <?php echo "<br>"; ?>
                 <b>DD Bank.</b> (<?php echo $DATA['dd_bank']?>)
                    <?php echo "<br>"; ?>
                 <b>DD Branch</b>  (<?php echo $DATA['dd_branch']?>)
				<?php 
				   }
				  ?></td>
                   <td> <a href="javascript:delete_spin('<?php echo $DATA['req_no']?>')"><div class="btn btn-danger">Delete</div></a> &nbsp;<a href="javascript:issue_epin('<?php echo $DATA['req_no']?>')"><div class="btn btn-success">Issue Now</div></a></td>
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
<form name="delete_form" method="post">
<input type="hidden"  value="none" name="to_delete" id="to_delete">
</form>
<form name="issue_form" method="post" >
<input type="hidden"  value="none" name="to_issue" id="to_issue">
</form>
<script>
function delete_spin(delet_id)
{
	$confirm= confirm('Are You Sure !');
	if($confirm==true)
	{
		$("#to_delete").val(delet_id);
		document.delete_form.submit();
	}
	else
	{
		return false;
	}
}
function issue_epin(issue_id)
{
	$confirm= confirm('Are You Sure !');
	if($confirm==true)
	{
		$("#to_issue").val(issue_id);
		document.issue_form.submit();
	}
	else
	{
		return false;
	}
}



</script>

</body>
</html>
