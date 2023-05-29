<?php require("../../common/check_user.php");?>
<?php require("../../../library/user.php");?>
<?php require("../../../library/epins_product.php");?>
<?php
$product_code="";
$mode="";
$dd_no="";
$dd_date="";
$dd_bank="";
$dd_branch="";
$cheque_no="";
$cheque_date="";
$cheque_bank="";
$cheque_branch="";
$payment_mode="";
if(!empty($_POST))
{
	$register_obj = new user;
	extract($_POST);
	$responce=$register_obj->request_new_epin($_POST['no_of_epin'],$_POST['product_code'],$_POST['mode'],$_POST['dd_no'],$_POST['dd_date'],$_POST['dd_bank'],$_POST['dd_branch'],$_POST['cheque_no'],$_POST['cheque_date'],					                                               $_POST['cheque_bank'],$_POST['cheque_branch']);	
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
  <?php require("common/left_side_bar.php");?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Request New Epins </h1>
    </section>
    
    <!-- Main content -->
    <section class="content" style="padding:0 20px;">
      <form name="myform" method="post" onsubmit="return submit_form()" role="form">
        <div class="row" style="margin-top:30px;">
          <div class="col-md-6">
            <div class="form-group">
              <label>Select Product</label>
              <?php 
			  $responce = new epins_product;
			  $epins = $responce->epins_select_products();
			  $epins_array = explode("!@!@!@!@",$epins);
			   ?>
              <select class="form-control" name="product_code" id="product_code" onChange="update_epin_fields()" style="max-width:300px;">
              
                <option value="">--Select-- </option>
				<?php echo $epins_array[0]; ?>

              
                             
              </select>
             
              <input type="hidden" id="product_code_price" value="<?php echo($epins_array[1]);?>" />
            </div>
            <div class="form-group">
              <label>Cost per unit</label>
              <input type="text" class="form-control" id="price_per_unit" name="price_per_unit" style="padding-left:3px;max-width:300px;" disabled value="" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>No. of E-pins</label>
              <select name="no_of_epin" id="number" class="form-control" style="width:auto;" onChange="update_epin_fields()">
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
                <option value="10">10</option>
              </select>
            </div>
            <div class="form-group">
              <label>Total Amount</label>
              <input type="text" name="price_total_unit" id="total" value="---" class="form-control" style="max-width:300px;padding-left:3px;" disabled  />
            </div>
          </div>
        </div>
        <div class="row" style="margin-top:20px;margin-bottom:20px;border-top:1px solid #CCC;">
          <div class="col-md-12">
            <h2>Mode of Payment</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
            
              <label>Payment Mode</label>
              <select style="width:auto;" name="mode" id="mode" class="form-control" onChange="view_payment_details()">
                <option 
                <?php
				if($mode=='cash')
				{
					echo "selected";
				}
				 ?>
                value="cash" >Cash</option>
                <option 
                <?php
				if($mode=='cheque')
				{
					echo "selected";
				}
				 ?> value="cheque">Cheque</option>
                <option 
                <?php
				if($mode=='dd')
				{
					echo "selected";
				}
				 ?> value="dd">Demand Draft</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row" id="dd_1" <?php if($mode!='dd'){ ?>style="display:none; <?php }?>">
          <div class="col-md-6">
            <div class="form-group">
              <label>DD No</label>
              <input type="text" value="<?php echo $dd_no;  ?>" class="form-control" onkeypress="return isNumberKey(event)" maxlength="6"  name="dd_no" id="ddno" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="col-md-12">DD Date</label>
              <input type="date" value="<?php echo $dd_date;  ?>" class="form-control"  name="dd_date" id="dd_date" placeholder="e.g 01-Jan-2016" />
            </div>
          </div>
        </div>
        <div class="row" id="dd_1" <?php if($mode!='dd'){ ?>style="display:none; <?php }?>">
          <div class="col-md-6">
            <div class="form-group">
              <label>DD Bank</label>
              <input type="text" value="<?php echo $dd_bank;  ?>" class="form-control" name="dd_bank" id="dd_bank" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>DD Branch</label>
              <input type="text" value="<?php echo $dd_branch;  ?>" class="form-control" name="dd_branch" id="dd_branch" />
            </div>
          </div>
        </div>
        <div class="row" id="cheque_1" <?php if($mode!='cheque'){ ?>style="display:none; <?php }?>">
          <div class="col-md-6">
            <div class="form-group">
              <label>Cheque No</label>
              <input type="text" value="<?php echo $cheque_no;  ?>" class="form-control" onkeypress="return isNumberKey(event)" maxlength="6"  name="cheque_no" id="cheque_no" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Cheque Date</label>
              <input type="text" value="<?php echo $cheque_date;  ?>" class="form-control "   name="cheque_date" id="datepicker" placeholder="e.g 01-Jan-2016"  />
              
            </div>
          </div>
        </div>
        
        <div class="row" id="cheque_2"<?php if($mode!='cheque'){ ?>style="display:none; <?php }?>">
          <div class="col-md-6">
            <div class="form-group">
              <label>Cheque Bank</label>
              <input type="text" value="<?php echo $cheque_bank;  ?>" class="form-control" name="cheque_bank" id="cheque_bank" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Cheque Branch</label>
              <input type="text" value="<?php echo $cheque_branch;  ?>" class="form-control" name="cheque_branch" id="cheque_branch" />
            </div>
          </div>
        </div>
        <div class="row" style="padding:30px 0;">
          <div class="col-md-12">
            <div >
              <input type="submit" name="submit" class="btn btn-danger">
            </div>
          </div>
        </div>
      </form>
    </section>
  </div>
  <!-- /.content-wrapper -->
  
  <?php require("common/footer.php");?>
</div>
<!-- ./wrapper -->
<?php require("common/footer_links.php");?>
<script>
function update_epin_fields()
{
	var selected_value=$("#product_code").val();
	var value_to_search="["+selected_value+",";
	var product_code_price=$("#product_code_price").val();
	var product_code_price_array=new Array();
	product_code_price_array=product_code_price.split("!@!@");
	var t=product_code_price_array.length;
	for(var i=0;i<t;i++)
	{		
		if(product_code_price_array[i].indexOf(value_to_search)!=-1)
		{
			var temp_array=product_code_price_array[i].split(",");
			var cost=temp_array[1];
			$("#price_per_unit").val(cost);
			var total_epins=$("#number").val();
			var total_cost=total_epins*cost;
			$("#total").val(total_cost);
			break;
		}
	}
}
function view_payment_details()
{
	var mode=$("#mode").val();
	if(mode=="cash")
	{
		$("#dd_1,#dd_2").css({'display':'none'});
	}
	else if(mode=="dd")
	{
		$("#dd_1,#dd_2").show();
		$("#cheque_1,#cheque_2").hide();
	}
	else if(mode=="cheque")
	{
		$("#dd_1,#dd_2").hide();
		$("#cheque_1,#cheque_2").show();
	}
}
function calculate_total()
{
	var no_epin=$("#number").val();
	var total=no_epin*2000;
	total=" Rs. "+total;
	$("#total").val(total);
}
function submit_form()
{
	var product_code=$("#product_code").val();
	if($("#product_code").val()=="")
	{
		alert("Error : Please select a product first...");
		$("#product_code").focus();
		return false;
	}
	var mode=$("#mode").val();
	if(mode=="cheque")
	{
		if($("#cheque_no").val()=="")
		{
			alert("Error : Please enter Cheque no...");
			$("#cheque_no").focus();
			return false;
		}

		if($("#cheque_date").val()=="")
		{
			alert("Error : Please choose Cheque date...");
			$("#cheque_date").focus();
			return false;
		}

		if($("#cheque_bank").val()=="")
		{
			alert("Error : Please enter cheque bank name...");
			$("#cheque_bank").focus();
			return false;
		}
		if($("#cheque_branch").val()=="")
		{
			alert("Error : Please enter bank branch...");
			$("#cheque_branch").focus();
			return false;
		}
	}

	if(mode=="dd")
	{
		if($("#ddno").val()=="")
		{
			alert("Error : Please enter DD no...");
			$("#ddno").focus();
			return false;
		}
		if($("#dd_date").val()=="")
		{
			alert("Error : Please choose DD date...");
			$("#dd_date").focus();
			return false;
		}
		
		if($("#dd_bank").val()=="")
		{
			alert("Error : Please enter bank name...");
			$("#dd_bank").focus();
			return false;
		}
		if($("#dd_branch").val()=="")
		{
			alert("Error : Please enter bank branch...");
			$("#dd_branch").focus();
			return false;
		}
	}
	var submit_or_not=confirm("Are you sure you want to send this epin request ?");
	if(submit_or_not==true)
	{
		document.myform.submit();
	}
	else
	{
		return false;
	}
}
</script>
<script>

$(document).ready(function()
{
$('#cheque_date').datepicker();
    
});
</script>

</body>

</html>
