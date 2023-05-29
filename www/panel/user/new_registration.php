<?php require_once("../../../library/initialize.php");?>
<?php require_once("../../common/check_user.php");?>
<?php require_once("../../../library/user.php");?>
<?php require_once("../common_php_scripts/convert_date.php");?>
<?php 
if(isset($_GET['epin_no']))
{
	//if($_GET['epin_no']=="")
	//{
	//	$pass_msg = "Epin Not Found";
	//	$pass_filename = "../".USER_DIRECTORY."/".basename(__FILE__);
	//	header("location:../common_php_scripts/redirect_msg.php?q=$pass_filename&msg=$pass_msg");
	//	exit(EXIT_ERROR);
	//}
	//if(filter_var($_GET['epin_no'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>EPIN_VALIDATE))))
	//{
	//	$pass_msg= "Not Valid";
	//	$pass_filename = "../".USER_DIRECTORY."/".basename(__FILE__);
	//	header("location:../common_php_scripts/redirect_msg.php?q=$pass_filename&msg=$pass_msg");
	//	exit(EXIT_ERROR);
//	}
	
}
else
{
	exit(EXIT_ERROR);
}
?>
<?php
$fetch_obj = new user;
$check_epins = $fetch_obj->check_epin_get_product($_GET['epin_no']);
if($check_epins->num_rows>=1)
{
	$DATA = $check_epins->fetch_assoc();
	$epin_no_db= $DATA['epin'];
	if($epin_no_db==$_GET['epin_no'])
	{
		 $epin_data = $DATA['epin'];
		 $epin_prd = $DATA['name'];
		 $epin_prd_price = $DATA['price'];
	}
	else
	{
		header("location:remaining_epins.php");
		exit(EXIT_ERROR);
	}
}
else
{
	header("location:remaining_epins.php");
	exit(EXIT_ERROR);
}
?>
<?php
$username="";
$password="";
$name="";
$dob="";
$gender="Male";
$father_name="";
$nationality="Indian";
$organization  = RIGHT_SIDE;
$educational_qualification="";
$proffession="";
$sponsor_username="";
$sponsor_did="";
$contact_no="";
$alternate_contact_no="";
$email_id="";
$c_address="";
$p_address="";

if(!empty($_POST))
{
	$register_obj = new user;
	extract($_POST);
	$responce=$register_obj->register_using_by_epin();
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php require("common/header.php");?>
  <?php  require("common/left_side_bar.php");?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> New Registration </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
    <form  action="" method="post" enctype="multipart/form-data" role="form" onSubmit="return validate_function()">
      <div class="row"> 
        <!-- left column -->
        <div class="col-md-6"> 
          <!-- general form elements -->
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Epin Details</h3>
            </div>
            <!-- /.box-header --> 
            <!-- form start -->
            <div class="box-body">
              <div class="form-group">
                <label for="Epin">Epin No.</label>
                <input name="epin" type="text" id="epin_no" value="<?php echo $epin_data ?>" class="form-control"  disabled>
              </div>
              <div class="form-group">
                <label for="Product">Product Name</label>
                <input type="prd_name" class="form-control" id="product" name="product" value="<?php echo $epin_prd ?>"  disabled>
              </div>
              <div class="form-group">
                <label for="Product">Product Price</label>
                <input type="prd_name" class="form-control" id="product" name="product" value="<?php echo $epin_prd_price ?>"  disabled>
              </div>
            </div>
            <!-- /.box-body --> 
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Login Details</h3>
            </div>
            <!-- /.box-header --> 
            <!-- form start -->
            <div class="box-body">
              <div class="form-group">
                <label for="username">Username <span style="color:#F00;">*</span></label>
                <input name="username" placeholder="Enter Username" type="text" id="username" class="form-control" value="<?php echo $username; ?>" >
              </div>
              <div class="form-group">
                <label for="password">Password <span style="color:#F00;">*</span></label>
                <input type="text" class="form-control" id="password"  name="password"  value="<?php echo $password ?>" placeholder="Enter Password" >
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
                <label for="name">Name <span style="color:#F00;">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" placeholder="Fullname" >
              </div>
              <div class="form-group">
                <label for="dob">Date of Birth <span style="color:#F00;">*</span></label>
                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>" placeholder="e.g 31-Mar-1990" >
              </div>
              <div class="form-group">
                <label for="gender">Gender <span style="color:#F00;">*</span> : </label>
                &nbsp;&nbsp;
                <label>
                  <input type="radio" name="gender" class="flat-red" <?php if($gender=='Male'){ ?>  checked <?php }?>value="Male"  style="position:relative;top:2px;" >
                  Male </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" name="gender" class="flat-red" <?php if($gender=='Female'){ ?>  checked <?php }?>value="Female" style="position:relative;top:2px;">
                  Female </label>
              </div>
              <div class="form-group">
                <label for="father_name">Father Name <span style="color:#F00;">*</span></label>
                <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo $father_name; ?>" placeholder="Father name here" >
              </div>
              <div class="form-group">
                <label for="nationality">Nationality <span style="color:#F00;">*</span></label>
                <input type="text" class="form-control" id="nationality" name="nationality" value="<?php echo $nationality; ?>" value="Indian" >
              </div>
              <div class="form-group">
                <label for="educational_qualification">Educational Qualification <span style="color:#F00;">*</span></label>
                <input type="text" class="form-control" id="educational_qualification" value="<?php echo $educational_qualification; ?>" name="educational_qualification" value="" >
              </div>
              <div class="form-group">
                <label for="profession">Profession <span style="color:#F00;">*</span></label>
                <input type="text" class="form-control" id="profession" name="proffession" value="<?php echo $proffession; ?>" >
              </div>
            </div>
            <!-- /.box-body --> 
          </div>
          <!-- /.box --> 
        </div>
        <!--/.col (left) --> 
        <!-- right column -->
        <div class="col-md-6"> 
          <!-- Horizontal Form --> 
          <!-- form start -->
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sponsor Details</h3>
            </div>
            <!-- /.box-header --> 
            <!-- form start -->
            <div class="box-body">
              <div class="form-group">
                <label for="name">Sponsor Username <span style="color:#F00;">*</span></label>
                <input type="text" class="form-control" id="sponsor_username" name="sponsor_username" value="<?php echo $sponsor_username; ?>" placeholder="" >
              </div>
              <div class="form-group">
                <label for="name">Sponsor DID <span style="color:#F00;">*</span></label>
                <input type="text" class="form-control" id="sponsor_did" name="sponsor_did" value="<?php echo $sponsor_did; ?>" placeholder="" >
              </div>
              <div class="form-group">
                <label for="organization">Organization <span style="color:#F00;">*</span> : </label>
                &nbsp;&nbsp;
                <label>
                  <input type="radio" name="organization" class="flat-red" <?php if($organization==LEFT_SIDE){ ?> checked<?php }?>  value="<?php echo LEFT_SIDE ?>" style="position:relative;top:2px;"  >
                  <?php echo LEFT_SIDE ?> </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" name="organization" class="flat-red"  <?php if($organization==RIGHT_SIDE){ ?> checked<?php }?> value="<?php echo RIGHT_SIDE ?>" style="position:relative;top:2px;">
                  <?php echo RIGHT_SIDE ?> </label>
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
                <label for="contact_no">Contact No <span style="color:#F00;">*</span></label>
                <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php echo $contact_no; ?>" >
              </div>
              <div class="form-group">
                <label for="alternate_contact_no">Alternate Contact No</label>
                <input type="text" class="form-control" id="alternate_contact_no" name="alternate_contact_no" value="<?php echo $alternate_contact_no; ?>" >
              </div>
              <div class="form-group">
                <label for="email_id">Email ID <span style="color:#F00;">*</span></label>
                <input type="text" class="form-control" id="email_id" name="email_id" value="<?php echo $email_id; ?>" >
              </div>
              <div class="form-group">
                <label for="c_address">Correspondence Address <span style="color:#F00;">*</span></label>
                <textarea class="form-control" name="c_address" id="c_address" rows="5" ><?php echo $c_address; ?></textarea>
              </div>
              <div class="form-group">
                <label for="p_address">Permanent Address <span style="color:#F00;">*</span></label>
                <textarea class="form-control" name="p_address" id="p_address" rows="5" ><?php echo $p_address; ?></textarea>
              </div>
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
          <button type="submit" class="btn btn-danger pull-right">Submit</button>
        </div>
      </div>
      <!-- /.content -->
    </form>
    
      </section>
  </div>
  <!-- /.content-wrapper -->
  
  <?php require("common/footer.php");?>
</div>
<!-- ./wrapper -->
<?php require("common/footer_links.php");?>
<script type="text/javascript">
function validate_function(){	
   function trim(str){				
	 return str.replace(/^\s*|\s*$/g,'');
	}	
if(trim(document.getElementById('username').value)==0){
	alert("Please enter username..!");
	document.getElementById('username').focus();
	return false;
}

if(trim(document.getElementById('password').value)==0){
	alert("Please enter password..!");
	document.getElementById('password').focus();
	return false;
}
if(trim(document.getElementById('name').value)==0){		
alert("Please enter name... !");
document.getElementById('name').focus();
return false;
}
if (!document.getElementById('name').value.match(/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/)){
alert("Please enter only alphabets !");
document.getElementById('name').value='';
document.getElementById('name').focus();
return false;
}

if(trim(document.getElementById('dob').value)==0){
	alert("Please enter dob..!");
	document.getElementById('dob').focus();
	return false;
}

if(trim(document.getElementById('father_name').value)==0){
	alert("Please enter father name..!");
	document.getElementById('father_name').focus();
	return false;
}

if(trim(document.getElementById('nationality').value)==0){
	alert("Please enter nationality..!");
	document.getElementById('nationality').focus();
	return false;
}

if(trim(document.getElementById('educational_qualification').value)==0){
	alert("Please enter qualification..!");
	document.getElementById('educational_qualification').focus();
	return false;
}
if(trim(document.getElementById('profession').value)==0){
	alert("Please enter profession..!");
	document.getElementById('profession').focus();
	return false;
}

if(trim(document.getElementById('sponsor_username').value)==0){
	alert("Please enter sponser username..!");
	document.getElementById('sponsor_username').focus();
	return false;
}

if(trim(document.getElementById('sponsor_did').value)==0){
	alert("Please enter sponser DID..!");
	document.getElementById('sponsor_did').focus();
	return false;
}
var mobno=trim(document.getElementById('contact_no').value);
if(trim(document.getElementById('contact_no').value)==0){
	alert("Please enter mobile no.!");
	document.getElementById('contact_no').focus();
	return false;
}
if(isNaN(document.getElementById('contact_no').value)){
	alert("Mobile no. should be no.!");
	document.getElementById('contact_no').focus();
	return false;
}
if(mobno.length < 10){
    alert("Mobile no. should be 10 digit long !");
	document.getElementById('contact_no').focus();
	return false;
}	
var email=trim(document.getElementById('email_id').value);
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(email=='')
  {
	  alert('Please enter Email Id');
	  document.getElementById('email_id').focus();
	  return false;
  }else if(!email.match(mailformat)){
alert("You have entered an invalid email id!");
document.getElementById('email_id').focus();
return false;
}

if(trim(document.getElementById('c_address').value)==0){
	alert("Please enter Correspondence Address..!");
	document.getElementById('c_address').focus();
	return false;
}

if(trim(document.getElementById('p_address').value)==0){
	alert("Please enter Permanent Address..!");
	document.getElementById('p_address').focus();
	return false;
}
}
</script>
</body>
</html>
