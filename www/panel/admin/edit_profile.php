<?php require_once("../../../library/initialize.php");?>
<?php require("../../common/check_admin.php");?>
<?php require("../../../library/admin.php");?>
<?php //echo SITE_WS_PATH; exit; ?>
<?php
$fetch_obj = new admin;
if(isset($_GET['user_value']))
{
	$view_search = $_GET['user_value'];
	if(filter_var($view_search,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>USERNAME_VALIDATE))))
	{
		header("location:select_user_detail.php?action=edit_profile");
		exit(EXIT_ERROR);
	}	
	$sql = $fetch_obj->get_table_id_username($view_search);
	if($sql->num_rows==1)
	{
		$DATA = $sql->fetch_assoc();
		$UID = $DATA['table_id']; 
		$edit_profile = $fetch_obj->edit_profile_admin($UID);
		$DATA=$edit_profile->fetch_assoc();
		
	}
	else
	{
		header("location:select_user_detail.php?action=edit_profile");
		exit(EXIT_ERROR);
	}
}
else
{
	header("location:select_user_detail.php?action=edit_profile");
	exit(EXIT_ERROR);
}

if(!empty($_POST))
{
 	 $register_obj = new admin;
	 extract($_POST);
	 $responce=$register_obj->update_all_profile_admin($UID);	
}
?>

<!DOCTYPE html>
<html>
<head>
<title>MLM Software</title>
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
      <h1> View/Update Profile </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
    <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validate_form()">
        <div class="row"> 
          <!-- left column -->
          <div class="col-md-6"> 
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Login Details</h3>
              </div>
              <!-- /.box-header --> 
              <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="username">User ID</label>
                  <input type="text" class="form-control" id="username" name="username" value="<?php echo $DATA['did'] ?>" disabled>
                </div>
              </div>
              <!-- /.box-body --> 
            </div>
            <!-- /.box -->
            
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Personal Details</h3>
              </div>
              <!-- /.box-header --> 
              <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Name </label>
                  <input type="text" class="form-control" d="name" name="name" value="<?php echo $DATA['name'] ?>" >
                </div>
                <div class="form-group">
                  <label>Date of Birth <span style="color:#F00;">*</span></label>
                  <br>
                  <?php
$dob= $DATA['dob'];
$explode = explode('-',$dob);
  ?>
                  <?php
$today_day=date("d");
$today_month=date("m");
$current_year=date("Y");
?>
                  <select class="form-control col-xs-4" style="width:auto !important;" name="dob_day" id="dob_day">
                    <option value="">-Day-</option>
                    <?php
 for($i=1;$i<=31;$i++)
 {
	if($i==$explode[0])
	{
		 echo("<option selected value=\"".$i."\"");
	 	echo(">".$i."</option>"); 
	}
	else
	{
		 echo("<option value=\"".$i."\"");
	 	echo(">".$i."</option>"); 
	}
	
 
 }
 ?>
                  </select>
                  <select class="form-control col-xs-4" style="width:auto !important;margin-left:10px;" name="dob_month" id="dob_month">
                    <option value="">-Month-</option>
                    <?php
		 if($explode[1]=='01')
		 { ?>
                    <option value="01" selected
         >Jan</option>
                    <?php
		  }
		  else
		  {?>
                    <option value="01"
         >Jan</option>
                    <?php
		  }
		  ?>
                    <?php 
		  if($explode[1]=='02')
		 { ?>
                    <option value="02"
          selected 
		 >Feb</option>
                    <?php
		  }
		  else
		  {?>
                    <option value="02"> Feb </option>
                    <?php
		  }
		  ?>
                    <?php 
		  if($explode[1]=='03')
		 { ?>
                    <option value="03"
 
          selected
		  >Mar</option>
                    <?php
		  }
		  else
		  {?>
                    <option value="03"
 
          >Mar</option>
                    <?php
		  }
		  ?>
                    <?php 
		  if($explode[1]=='04')
		 { ?>
                    <option value="04"
       selected  >Apr</option>
                    <?php
		  }
		  else
		  {?>
                    <option value="04"
>Apr</option>
                    <?php
		  }
		  ?>
                    <?php 
		  if($explode[1]=='05')
		 { ?>
                    <option value="05"
          selected 
		>May</option>
                    <?php
		  }
		  else
		  {?>
                    <option value="05"

           
		>May</option>
                    <?php
		  }
		  ?>
                    <?php 
		  if($explode[1]=='06')
		 { ?>
                    <option value="06"

          selected 
		 >Jun</option>
                    <?php
		  }
		  else
		  {?>
                    <option value="06"
           
		  >Jun</option>
                    <?php
		  }
		  ?>
                    <?php 
		  if($explode[1]=='07')
		 { ?>
                    <option value="07"

          selected 
		  >Jul</option>
                    <?php
		  }
		  else
		  {?>
                    <option value="07"

           
		 >Jul</option>
                    <?php
		  }
		  ?>
                    <?php 
		  if($explode[1]=='08')
		 { ?>
                    <option value="08"
          selected
		  >Aug</option>
                    <?php
		  }
		  else
		  {?>
                    <option value="08"

          
		 >Aug</option>
                    <?php
		  }
		  ?>
                    <?php 
		  if($explode[1]=='09')
		 { ?>
                    <option value="09"

          selected 
		 >Sep</option>
                    <?php
		  }
		  else
		  {?>
                    <option value="09"
           
		  >Sep</option>
                    <?php
		  }
		  ?>
                    <?php 
		  if($explode[1]=='10')
		 { ?>
                    <option value="10"

          selected
		>Oct</option>
                    <?php
		  }
		  else
		  {?>
                    <option value="10"
 >Oct</option>
                    <?php
		  }
 ?>
                    <?php 
		  if($explode[1]=='11')
		 { ?>
                    <option value="11"

          selected 
		 >Nov</option>
                    <?php
		  }
		  else
		  {?>
                    <option value="11"
>Nov</option>
                    <?php
		  }
?>
                    <?php 
		  if($explode[1]=='12')
		 { ?>
                    <option value="12"

          selected 
		 >Dec</option>
                    <?php
		  }
		  else
		  {?>
                    <option value="12"
 >Dec</option>
                    <?php
		  }
		  ?>
                  </select>
                  <select class="form-control col-xs-4" style="width:auto !important;margin-left:10px;" name="dob_year" id="dob_year">
                    <option value="">-Year-</option>
                    <?php
$current_year=date("Y");
$last = $current_year-18;
$first = $current_year-68;
 for($c=$first;$c<=$last;$c++)
 {
	if($c==$explode[2])
	{
		 echo("<option selected value=\"".$c."\"");
	 	echo(">".$c."</option>"); 
	}
	else
	{
 	echo("<option value=\"".$c."\"");
 	echo(">".$c."</option>");
	}
 }
 ?>
                  </select>
                </div>
                <div class="clearfix"></div>
                <div class="form-group" style="margin-top:20px;">
                  <label for="gender">Gender <span style="color:#F00;">*</span> : </label>
                  &nbsp;&nbsp;
                  <label>
                    <input type="radio"    name="gender" class="flat-red" value="Male" style="position:relative;top:2px;"
                  
                   <?php if($DATA['gender']=='Male')
				  { ?>
                   checked
				   <?php } ?>>
                    Male </label>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label>
                    <input type="radio"  name="gender" class="flat-red" value="Female" style="position:relative;top:2px;"
                   <?php 
				  if($DATA['gender']=='Female')
				  { ?> checked 
				  <?php
				  }?> 
                  
                  >
                    Female </label>
                </div>
                <div class="form-group">
                  <label for="father_name">Father Name <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control"  id="father_name" name="father_name" value="<?php echo $DATA['father_name'] ?>" style="text-transform:capitalize;">
                </div>
                <div class="form-group">
                  <label for="mother_name">Mother Name <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control" iid="mother_name" name="mother_name" value="<?php echo $DATA['mother_name'] ?>" style="text-transform:capitalize;" >
                </div>
                <div class="form-group">
                  <label for="pan">PAN</label>
                  <input type="text" class="form-control"id="pan" name="pan" value="<?php echo $DATA['pan'] ?>" >
                </div>
              </div>
              <!-- /.box-body --> 
            </div>
            <!-- /.box -->
            
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Contact Details</h3>
              </div>
              <!-- /.box-header --> 
              <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="contact_no">Contact No</label>
                  <input type="text" class="form-control"id="contact_no" name="contact_no" value="<?php echo $DATA['contact_no'] ?>" >
                </div>
                <div class="form-group">
                  <label for="alternate_contact_no">Alternate Contact No (if any)</label>
                  <input type="text" class="form-control" id="alternate_contact_no" name="alternate_contact_no" value="<?php echo $DATA['alternate_contact_no'] ?>" onkeypress="return isNumberKey(event)" >
                </div>
                <div class="form-group">
                  <label for="email_id">Email ID </label>
                  <input type="email" class="form-control"  style="text-transform:lowercase;" id="email_id" name="email_id" value="<?php echo $DATA['email_id'] ?>" >
                </div>
              </div>
              <!-- /.box-body --> 
            </div>
            <!-- /.box -->
            
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Bank Details</h3>
              </div>
              <!-- /.box-header --> 
              <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="bank_name">Bank Name</label>
                  <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php echo $DATA['bank_name'] ?>" style="text-transform:capitalize;" >
                </div>
                <div class="form-group">
                  <label for="bank_name">Bank Branch</label>
                  <input type="text" class="form-control" id="bank_branch" name="bank_branch" style="text-transform:capitalize;" value="<?php echo $DATA['bank_branch'] ?>">
                </div>
                <div class="form-group">
                  <label for="bank_account_no">Account No</label>
                  <input type="text" class="form-control" id="bank_account_no" name="bank_account_no" value="<?php echo $DATA['bank_account_no'] ?>">
                </div>
                <div class="form-group">
                  <label for="ifsc_code">IFSC Code</label>
                  <input type="text" class="form-control" id="bank_ifsc_code" name="bank_ifsc_code" style="text-transform:uppercase;" value="<?php echo $DATA['bank_ifsc_code'] ?>">
                </div>
              </div>
              <!-- /.box-body --> 
            </div>
          </div>
          <!--/.col (left) --> 
          <!-- right column -->
          <div class="col-md-6"> 
            <!-- Horizontal Form --> 
            <!-- form start -->
            
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Permanent Address <span style="color:#F00;">*</span></h3>
              </div>
              <!-- /.box-header --> 
              <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <textarea class="form-control" name="p_local" id="p_local" rows="3" placeholder="Local Address"><?php echo $DATA['p_local'] ?></textarea>

                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="p_city" id="p_city" placeholder="City" style="text-transform:capitalize;" value="<?php echo $DATA['p_city'] ?>">
                </div>
                <div class="form-group">
                  <select class="form-control" name="p_state" id="p_state">
                    <option value="">-Select State-</option>
                    <option <?php if($DATA['c_state']=='1'){ ?> selected<?php }?> value="1">Andaman &amp; Nicobar</option>
                    <option <?php if($DATA['c_state']=='2'){ ?> selected<?php }?> value="2">Andhra Pradesh</option>
                    <option <?php if($DATA['c_state']=='3'){ ?> selected<?php }?> value="3">Arunachal Pradesh</option>
                    <option <?php if($DATA['c_state']=='4'){ ?> selected<?php }?> value="4">Assam</option>
                    <option <?php if($DATA['c_state']=='5'){ ?> selected<?php }?> value="5">Bihar</option>
                    <option <?php if($DATA['c_state']=='6'){ ?> selected<?php }?> value="6">Chhattisgarh</option>
                    <option <?php if($DATA['c_state']=='7'){ ?> selected<?php }?> value="7">Dadrar Nagar Haveli</option>
                    <option <?php if($DATA['c_state']=='8'){ ?> selected<?php }?> value="8">Daman &amp; Diu</option>
                    <option <?php if($DATA['c_state']=='9'){ ?> selected<?php }?> value="9">Delhi</option>
                    <option <?php if($DATA['c_state']=='10'){ ?> selected<?php }?> value="10">Goa</option>
                    <option <?php if($DATA['c_state']=='11'){ ?> selected<?php }?> value="11">Gujarat</option>
                    <option <?php if($DATA['c_state']=='12'){ ?> selected<?php }?> value="12">Haryana</option>
                    <option <?php if($DATA['c_state']=='13'){ ?> selected<?php }?> value="13">Himachal Pradesh</option>
                    <option <?php if($DATA['c_state']=='14'){ ?> selected<?php }?> value="14">Jammu &amp; Kashmir</option>
                    <option <?php if($DATA['c_state']=='15'){ ?> selected<?php }?> value="15">Jharkhand</option>
                    <option <?php if($DATA['c_state']=='16'){ ?> selected<?php }?> value="16">Karnataka</option>
                    <option <?php if($DATA['c_state']=='17'){ ?> selected<?php }?> value="17">Kerala</option>
                    <option <?php if($DATA['c_state']=='18'){ ?> selected<?php }?> value="18">Lakshadweep</option>
                    <option <?php if($DATA['c_state']=='19'){ ?> selected<?php }?> value="19">Madhya Pradesh</option>
                    <option <?php if($DATA['c_state']=='20'){ ?> selected<?php }?> value="20">Maharashtra</option>
                    <option <?php if($DATA['c_state']=='21'){ ?> selected<?php }?> value="21">Manipur</option>
                    <option <?php if($DATA['c_state']=='22'){ ?> selected<?php }?> value="21">Meghalaya</option>
                    <option <?php if($DATA['c_state']=='23'){ ?> selected<?php }?> value="22">Mizoram</option>
                    <option <?php if($DATA['c_state']=='24'){ ?> selected<?php }?> value="23">Nagaland</option>
                    <option <?php if($DATA['c_state']=='25'){ ?> selected<?php }?> value="24">Orissa</option>
                    <option <?php if($DATA['c_state']=='26'){ ?> selected<?php }?> value="25">Pondicherry</option>
                    <option <?php if($DATA['c_state']=='27'){ ?> selected<?php }?> value="26">Punjab</option>
                    <option <?php if($DATA['c_state']=='28'){ ?> selected<?php }?> value="27">Rajasthan</option>
                    <option <?php if($DATA['c_state']=='29'){ ?> selected<?php }?> value="29">Sikkim</option>
                    <option <?php if($DATA['c_state']=='30'){ ?> selected<?php }?> value="30">Tamil Nadu</option>
                    <option <?php if($DATA['c_state']=='31'){ ?> selected<?php }?> value="31">Telangana</option>
                    <option <?php if($DATA['c_state']=='32'){ ?> selected<?php }?> value="32">Tripura</option>
                    <option <?php if($DATA['c_state']=='33'){ ?> selected<?php }?> value="33">Uttar Pradesh</option>
                    <option <?php if($DATA['c_state']=='34'){ ?> selected<?php }?> value="34">Uttaranchal</option>
                    <option <?php if($DATA['c_state']=='35'){ ?> selected<?php }?> value="35">West Bengal</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="p_pincode" id="p_pincode" placeholder="Pincode" value="<?php echo $DATA['p_pincode'] ?>" maxlength="6" onkeypress="return isNumberKey(event)">
                </div>
              </div>
              <!-- /.box-body --> 
            </div>
            <!-- /.box -->
            
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Correspondence Address <span style="color:#F00;">*</span> </h3>
                <input type="checkbox" onclick="FillBilling(this.form)" name="billingtoo">
                Copy Permanent To Correspondence </span> </div>
              <!-- /.box-header --> 
              <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <textarea class="form-control" name="c_local" id="c_local" rows="3" placeholder="Local Address"><?php echo $DATA['c_local'] ?></textarea>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="c_city" id="c_city" placeholder="City" style="text-transform:capitalize;" value="<?php echo $DATA['c_city'] ?>">
                </div>
                <div class="form-group">
                  <select class="form-control" name="c_state" id="c_state">
                    <option value="">-Select State-</option>
                    <option <?php if($DATA['c_state']=='1'){ ?> selected<?php }?> value="1">Andaman &amp; Nicobar</option>
                    <option <?php if($DATA['c_state']=='2'){ ?> selected<?php }?> value="2">Andhra Pradesh</option>
                    <option <?php if($DATA['c_state']=='3'){ ?> selected<?php }?> value="3">Arunachal Pradesh</option>
                    <option <?php if($DATA['c_state']=='4'){ ?> selected<?php }?> value="4">Assam</option>
                    <option <?php if($DATA['c_state']=='5'){ ?> selected<?php }?> value="5">Bihar</option>
                    <option <?php if($DATA['c_state']=='6'){ ?> selected<?php }?> value="6">Chhattisgarh</option>
                    <option <?php if($DATA['c_state']=='7'){ ?> selected<?php }?> value="7">Dadrar Nagar Haveli</option>
                    <option <?php if($DATA['c_state']=='8'){ ?> selected<?php }?> value="8">Daman &amp; Diu</option>
                    <option <?php if($DATA['c_state']=='9'){ ?> selected<?php }?> value="9">Delhi</option>
                    <option <?php if($DATA['c_state']=='10'){ ?> selected<?php }?> value="10">Goa</option>
                    <option <?php if($DATA['c_state']=='11'){ ?> selected<?php }?> value="11">Gujarat</option>
                    <option <?php if($DATA['c_state']=='12'){ ?> selected<?php }?> value="12">Haryana</option>
                    <option <?php if($DATA['c_state']=='13'){ ?> selected<?php }?> value="13">Himachal Pradesh</option>
                    <option <?php if($DATA['c_state']=='14'){ ?> selected<?php }?> value="14">Jammu &amp; Kashmir</option>
                    <option <?php if($DATA['c_state']=='15'){ ?> selected<?php }?> value="15">Jharkhand</option>
                    <option <?php if($DATA['c_state']=='16'){ ?> selected<?php }?> value="16">Karnataka</option>
                    <option <?php if($DATA['c_state']=='17'){ ?> selected<?php }?> value="17">Kerala</option>
                    <option <?php if($DATA['c_state']=='18'){ ?> selected<?php }?> value="18">Lakshadweep</option>
                    <option <?php if($DATA['c_state']=='19'){ ?> selected<?php }?> value="19">Madhya Pradesh</option>
                    <option <?php if($DATA['c_state']=='20'){ ?> selected<?php }?> value="20">Maharashtra</option>
                    <option <?php if($DATA['c_state']=='21'){ ?> selected<?php }?> value="21">Manipur</option>
                    <option <?php if($DATA['c_state']=='22'){ ?> selected<?php }?> value="21">Meghalaya</option>
                    <option <?php if($DATA['c_state']=='23'){ ?> selected<?php }?> value="22">Mizoram</option>
                    <option <?php if($DATA['c_state']=='24'){ ?> selected<?php }?> value="23">Nagaland</option>
                    <option <?php if($DATA['c_state']=='25'){ ?> selected<?php }?> value="24">Orissa</option>
                    <option <?php if($DATA['c_state']=='26'){ ?> selected<?php }?> value="25">Pondicherry</option>
                    <option <?php if($DATA['c_state']=='27'){ ?> selected<?php }?> value="26">Punjab</option>
                    <option <?php if($DATA['c_state']=='28'){ ?> selected<?php }?> value="27">Rajasthan</option>
                    <option <?php if($DATA['c_state']=='29'){ ?> selected<?php }?> value="29">Sikkim</option>
                    <option <?php if($DATA['c_state']=='30'){ ?> selected<?php }?> value="30">Tamil Nadu</option>
                    <option <?php if($DATA['c_state']=='31'){ ?> selected<?php }?> value="31">Telangana</option>
                    <option <?php if($DATA['c_state']=='32'){ ?> selected<?php }?> value="32">Tripura</option>
                    <option <?php if($DATA['c_state']=='33'){ ?> selected<?php }?> value="33">Uttar Pradesh</option>
                    <option <?php if($DATA['c_state']=='34'){ ?> selected<?php }?> value="34">Uttaranchal</option>
                    <option <?php if($DATA['c_state']=='35'){ ?> selected<?php }?> value="35">West Bengal</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="c_pincode" id="c_pincode" placeholder="Pincode" value="<?php echo $DATA['c_pincode'] ?>" maxlength="6" onkeypress="return isNumberKey(event)">
                </div>
              </div>
              <!-- /.box-body --> 
            </div>
            <!-- /.box -->
            
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Nominee Details</h3>
              </div>
              <!-- /.box-header --> 
              <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="username">Nominee Name <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control" style="text-transform:capitalize;" value="<?php echo $DATA['nominee_name'] ?>" name="nominee_name" id="nominee_name">
                </div>
                <div class="form-group">
                  <label for="username">Relation <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control" value="<?php echo $DATA['nominee_relation'] ?>" name="nominee_relation" id="nominee_relation">
                </div>
                <div class="form-group">
                  <label for="nominee_age">Age <span style="color:#F00;">*</span></label>
                  <br>
                  <input type="text" class="form-control" name="nominee_age" id="nominee_age" style="max-width:80px;display:inline-block;" value="<?php echo $DATA['nominee_age'] ?>" maxlength="2" onkeypress="return isNumberKey(event)">
                  <strong>years</strong> </div>
              </div>
              <!-- /.box-body --> 
            </div>
            <!-- /.box --> 
            
          </div>
          <!--/.col (right) --> 
        </div>
        <!-- /.row -->
        
        <div class="row">
          <div class="col-md-12">
            <button type="button" onclick="" class="btn btn-danger" style="margin-right:10px;margin-top:10px;">Back</button>
            <button type="submit" class="btn btn-success" name="UPDATE" style="margin-top:10px;">Submit</button>
          </div>
        </div>
      </form>
      </div>
  <!-- /.content-wrapper -->
  
  <?php require("common/footer.php");?>
</div>
<!-- ./wrapper -->
<?php require("common/footer_links.php");?>
</body>
</html>
