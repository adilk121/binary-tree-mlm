<?php require_once("../../../library/initialize.php");?>
<?php require("../../common/check_user.php");?>
<?php require("../../../library/user.php");?>
<?php 
$fetch_obj = new user;			
$UID = $_SESSION['log_id'];
if(isset($_GET['username']))
{
	$view_search = $_GET['username'];
	if(filter_var($view_search,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>USERNAME_VALIDATE))))
	{
		exit(EXIT_ERROR);
	}	
	$sql = $fetch_obj->get_table_id_username($view_search);
	if($sql->num_rows==1)
	{
		$DATA = $sql->fetch_assoc();
		$UID = $DATA['table_id']; 
		$found_id = "No";
		$fetch_obj->check_in_downline($UID,$_SESSION['log_id'],$found_id);
		if($found_id=='No')
		{
			$UID=$_SESSION['log_id'];
		}
		else
		{
			$UID = $DATA['table_id']; 
		}
	
	}
	else
	{
		$UID=$_SESSION['log_id'];
	}
}
?>

<?php 
			$remain_org=$fetch_obj->oraganisation_chart($UID);
			$name_array = $fetch_obj->get_chart_data("name_array");
			$username_array = $fetch_obj->get_chart_data("username_array");
			$did_array = $fetch_obj->get_chart_data("did_array");
			$tag_araay = $fetch_obj->get_chart_data("tag_araay");
			$created_date_araay = $fetch_obj->get_chart_data("created_date_araay");
			$status_araay = $fetch_obj->get_chart_data("status_araay");
			
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
      <h1> Organization Chart </h1>
    </section>
    <form action="" method="get">
      <div>
        <input type="text" name="username" style="margin-left:10px; margin-top:10px; width:200px;" placeholder=" Search FSO SSO">
        <input type="submit" name="submit" value="Submit">
      </div>
    </form>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <table style="width:98%;margin:auto;min-width:900px;font-size:12px;color:#333;font-weight:bold;line-height:25px;" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="8" align="center"><img src="../images/plant_icon_new.png" height="90px" class="classForHoverEffect" /><br>
                <?php echo ucwords($name_array[0])?></td>
            </tr>
            <tr>
              <td colspan="8"><div style="position:relative;width:50%;margin:auto;height:2px;background-color:#333;">
                  <div style="position:absolute;width:5px;height:5px;left:-2px;top:-2px;background-color:#333;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;"> </div>
                  <div style="position:absolute;width:5px;height:5px;right:-2px;top:-2px;background-color:#333;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;"> </div>
                </div></td>
            </tr>
            <tr>
              <?php if($name_array[1]!='')
					{?>
              <td colspan="4" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
              <a href="organization_chart.php?username=<?php echo $username_array[1]?>"><?php echo ucwords($name_array[1])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="4" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[2]!='')
					{?>
              <td colspan="4" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
              <a href="organization_chart.php?username=<?php echo $username_array[2]?>"><?php echo ucwords($name_array[2])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="4" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
            </tr>
            <tr>
              <td colspan="4"><div style="position:relative;width:50%;margin:auto;height:2px;background-color:#333;">
                  <div style="position:absolute;width:5px;height:5px;left:-2px;top:-2px;background-color:#333;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;"> </div>
                  <div style="position:absolute;width:5px;height:5px;right:-2px;top:-2px;background-color:#333;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;"> </div>
                </div></td>
              <td colspan="4"><div style="position:relative;width:50%;margin:auto;height:2px;background-color:#333;">
                  <div style="position:absolute;width:5px;height:5px;left:-2px;top:-2px;background-color:#333;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;"> </div>
                  <div style="position:absolute;width:5px;height:5px;right:-2px;top:-2px;background-color:#333;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;"> </div>
                </div></td>
            </tr>
            <tr>
              <?php if($name_array[3]!='')
					{?>
              <td colspan="2" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
            <a href="organization_chart.php?username=<?php echo $username_array[3]?>"><?php echo ucwords($name_array[3])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="2" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[4]!='')
					{?>
              <td colspan="2" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
             <a href="organization_chart.php?username=<?php echo $username_array[4]?>"><?php echo ucwords($name_array[4])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="2" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[5]!='')
					{?>
              <td colspan="2" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
             <a href="organization_chart.php?username=<?php echo $username_array[5]?>"><?php echo ucwords($name_array[5])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="2" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[6]!='')
					{?>
              <td colspan="2" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
              <a href="organization_chart.php?username=<?php echo $username_array[6]?>"><?php echo ucwords($name_array[6])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="2" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
            </tr>
            <tr>
              <td colspan="2"><div style="position:relative;width:50%;margin:auto;height:2px;background-color:#333;">
                  <div style="position:absolute;width:5px;height:5px;left:-2px;top:-2px;background-color:#333;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;"> </div>
                  <div style="position:absolute;width:5px;height:5px;right:-2px;top:-2px;background-color:#333;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;"> </div>
                </div></td>
              <td colspan="2"><div style="position:relative;width:50%;margin:auto;height:2px;background-color:#333;">
                  <div style="position:absolute;width:5px;height:5px;left:-2px;top:-2px;background-color:#333;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;"> </div>
                  <div style="position:absolute;width:5px;height:5px;right:-2px;top:-2px;background-color:#333;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;"> </div>
                </div></td>
              <td colspan="2"><div style="position:relative;width:50%;margin:auto;height:2px;background-color:#333;">
                  <div style="position:absolute;width:5px;height:5px;left:-2px;top:-2px;background-color:#333;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;"> </div>
                  <div style="position:absolute;width:5px;height:5px;right:-2px;top:-2px;background-color:#333;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;"> </div>
                </div></td>
              <td colspan="2"><div style="position:relative;width:50%;margin:auto;height:2px;background-color:#333;">
                  <div style="position:absolute;width:5px;height:5px;left:-2px;top:-2px;background-color:#333;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;"> </div>
                  <div style="position:absolute;width:5px;height:5px;right:-2px;top:-2px;background-color:#333;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;"> </div>
                </div></td>
            </tr>
            <tr>
              <?php if($name_array[7]!='')
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
             <a href="organization_chart.php?username=<?php echo $username_array[7]?>"><?php echo ucwords($name_array[7])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[8]!='')
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
              <a href="organization_chart.php?username=<?php echo $username_array[8]?>"><?php echo ucwords($name_array[8])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[9]!='')
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
              <a href="organization_chart.php?username=<?php echo $username_array[9]?>"><?php echo ucwords($name_array[9])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[10]!='')
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
              <a href="organization_chart.php?username=<?php echo $username_array[10]?>"><?php echo ucwords($name_array[10])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[11]!='')
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
             <a href="organization_chart.php?username=<?php echo $username_array[11]?>"><?php echo ucwords($name_array[11])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[12]!='')
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
             <a href="organization_chart.php?username=<?php echo $username_array[12]?>"><?php echo ucwords($name_array[12])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[13]!='')
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
             <a href="organization_chart.php?username=<?php echo $username_array[13]?>"><?php echo ucwords($name_array[13])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[14]!='')
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
              <a href="organization_chart.php?username=<?php echo $username_array[14]?>"><?php echo ucwords($name_array[14])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
            </tr>
          </table>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
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
<!--<div id="div_to_show" style="position:absolute;border:1px solid#CCC;box-shadow:2px 2px 5px 2px #000;;display:none;z-index:999999;padding:20px;background: -webkit-linear-gradient(#0CF, #FFF);background: -o-linear-gradient(#0CF, #FFF);background: -moz-linear-gradient(#0CF, #FFF);background: linear-gradient(#C90, #FFF);font-weight:bold;background-color:#FFF;">
  <table>
    <tr>
      <td align="center" colspan="3"></td>
    </tr>
    <tr style="height:10px;">
      <td></td>
    </tr>
    <tr>
      <td><span style="font-weight:bold;">Name</span></td>
      <td style="padding:0 10px;">:</td>
      <td>Rohit Sansanwal</td>
    </tr>
    <tr>
      <td><span style="font-weight:bold;">Username</span></td>
      <td style="padding:0 10px;">:</td>
      <td>rohit_sansanwal</td>
    </tr>
    <tr>
      <td><span style="font-weight:bold;">DID</span></td>
      <td style="padding:0 10px;">:</td>
      <td>91685485</td>
    </tr>
    <tr>
      <td><span style="font-weight:bold;">Reg. Date</span></td>
      <td style="padding:0 10px;">:</td>
      <td>15-Mar-2016</td>
    </tr>
    <tr>
      <td><span style="font-weight:bold;">Tag</span></td>
      <td style="padding:0 10px;">:</td>
      <td>Silver</td>
    </tr>
  </table>
</div>-->
<script>
var mouseX;
var mouseY;
$(document).mousemove( function(e) {
   mouseX = e.pageX; 
   mouseY = e.pageY;
});  
$(".classForHoverEffect").mouseenter(function(){
  $('#div_to_show').css({'top':mouseY,'left':mouseX}).fadeIn('fast');
});

$(".classForHoverEffect").mouseout(function(){
  $('#div_to_show').hide();
});

</script>
</body>
</html>
