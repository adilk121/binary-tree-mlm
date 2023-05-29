<?php require_once("../../../library/initialize.php");?>
<?php require("../../common/check_user.php");?>
<?php require("../../../library/user.php");?>
<?php
$fetch_obj = new user;
$downline_array = array();
$fso_downline_array = array();
$sso_downline_array = array();
$organisation = "all";
if(isset($_GET['organisation']))
{
	$organisation = $_GET['organisation'];
	if(($organisation!=LEFT_SIDE)&&($organisation!=RIGHT_SIDE)&&($organisation!="all"))
	{
		$organisation = "all";
	}	

}
$sort_by = "Name";
$order_by = "asc";
if(isset($_GET['order_by']))
{
	$order_by = $_GET['order_by'];
	
}
if(isset($_GET['sort_by']))
{
	$sort_by = $_GET['sort_by'];
	
	if(($sort_by!="Name")&&($sort_by!="Username")&&($sort_by!="DID"))
	{
		$sort_by = "Name";
		
	}	
}
$fetch_obj->parse_in_downline_org_list($_SESSION['log_id'],$fso_downline_array,$sso_downline_array,$organisation);
$result = $fetch_obj->downline_list($fso_downline_array,$sso_downline_array,$sort_by,$order_by);

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
      <h1> Organization List </h1>
    </section>
    
    <!-- Main content -->
    <section class="content"> <span style="margin-left:10px;">
      <form action="" method="get">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-6"> Organisation :
              <select name="organisation" style="width:150px; height:25px; margin-bottom:5px;">
                <option value="all"> --ALL-- </option>
                <option <?php if($organisation==LEFT_SIDE){ ?> selected <?php }?>> <?php echo LEFT_SIDE ?> </option>
                <option <?php if($organisation==RIGHT_SIDE){ ?> selected <?php }?>> <?php echo RIGHT_SIDE ?> </option>
              </select>
              <div class="col-md-6"> Sort By :
                <select name="sort_by" style="width:150px; height:25px; margin-bottom:5px; margin-left:20px;">
                 <option <?php if($sort_by=='Name'){ ?> selected <?php }?>> Name </option>
                  <option <?php if($sort_by=='Username'){ ?> selected <?php }?>> Username </option>
                  <option <?php if($sort_by=='DID'){ ?> selected <?php }?>> DID </option>
                </select>
                <select name="order_by" style=" height:25px; margin-left:5px;">
                <option <?php if($order_by=='asc'){ ?> selected <?php }?>value="asc">
                Ascending
                </option>
               <option <?php if($order_by=='desc'){ ?> selected <?php }?> value="desc">
                Descending
                </option>

                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <input type="submit" style="width:100px; height:25px; margin-bottom:5px; margin-left:20px;color:#000">
            &nbsp;&nbsp;&nbsp; <a href="organization_list.php">
            <input type="button" value="Reset" style="width:100px; height:25px; margin-bottom:5px; margin-left:20px; color:#000">
            </a> </div>
        </div>
      </form>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="width:30px;">S.NO</th>
                    <th>USERNAME</th>
                    <th>DID</th>
                    <th>NAME</th>
                    <th>CONTACT NO</th>
                    <th>EMAIL ID</th>
                    <th>ORGANIZATION</th>
                    <th>DATE OF REGISTRATION</th>
                    <th>STATUS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php	
	 $x=1;
	 while($data = $result->fetch_assoc())
	 {
?>
                  <tr>
                    <td><?php echo $x; ?></td>
                    <td><?php echo $data['username'];?></td>
                    <td><?php echo $data['did'];?></td>
                    <td><?php echo ucwords($data['name']);?></td>
                    <td><?php echo $data['contact_no'];?></td>
                    <td><?php echo $data['email_id'];?></td>
                    <td><?php echo $data['org'];?></td>
                    <td><?php echo date(DATE_FORMET, strtotime($data['created_date']));?></td>
                    <td><?php echo ucwords($data['status']);?></td>
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
