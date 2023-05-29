<?php require_once("../../../library/initialize.php");?>
<?php require("../../common/check_admin.php");?>
<?php require("../../../library/admin.php");?>
<?php 
$fetch_obj = new admin;			
if(isset($_GET['user_value']))
{
	$view_search = $_GET['user_value'];
	if(filter_var($view_search,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>USERNAME_VALIDATE))))
	{
		header("location:select_user_detail.php?action=view_downline_chart");
		exit(EXIT_ERROR);
	}	
	$sql = $fetch_obj->get_table_id_username($view_search);
	if($sql->num_rows==1)
	{
		$DATA = $sql->fetch_assoc();
		$UID = $DATA['table_id']; 
		$fetch_obj->check_in_downline($UID);
		$UID = $DATA['table_id']; 
	}
	else
	{
		header("location:select_user_detail.php?action=view_downline_chart");
		exit(EXIT_ERROR);
	}
	
	}
	else
	{
		header("location:select_user_detail.php?action=view_downline_chart");
		exit(EXIT_ERROR);
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
        <input type="text" name="user_value" style="margin-left:10px; margin-top:10px; width:200px;" placeholder=" Search FSO SSO">
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
              <a href="view_downline_chart.php?username=<?php echo $username_array[1]?>"><?php echo ucwords($name_array[1])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="4" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[2]!='')
					{?>
              <td colspan="4" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
              <a href="view_downline_chart.php?user_value=<?php echo $username_array[2]?>"><?php echo ucwords($name_array[2])?> </a></td>
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
            <a href="view_downline_chart.php?user_value=<?php echo $username_array[3]?>"><?php echo ucwords($name_array[3])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="2" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[4]!='')
					{?>
              <td colspan="2" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
             <a href="view_downline_chart.php?user_value=<?php echo $username_array[4]?>"><?php echo ucwords($name_array[4])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="2" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[5]!='')
					{?>
              <td colspan="2" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
             <a href="view_downline_chart.php?user_value=<?php echo $username_array[5]?>"><?php echo ucwords($name_array[5])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="2" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[6]!='')
					{?>
              <td colspan="2" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
              <a href="view_downline_chart.php?user_value=<?php echo $username_array[6]?>"><?php echo ucwords($name_array[6])?> </a></td>
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
             <a href="view_downline_chart.php?user_value=<?php echo $username_array[7]?>"><?php echo ucwords($name_array[7])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[8]!='')
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
              <a href="view_downline_chart.php?user_value=<?php echo $username_array[8]?>"><?php echo ucwords($name_array[8])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[9]!='')
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
              <a href="view_downline_chart.php?user_value=<?php echo $username_array[9]?>"><?php echo ucwords($name_array[9])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[10]!='')
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
              <a href="view_downline_chart.php?user_value=<?php echo $username_array[10]?>"><?php echo ucwords($name_array[10])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[11]!='')
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
             <a href="view_downline_chart.php?user_value=<?php echo $username_array[11]?>"><?php echo ucwords($name_array[11])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[12]!='')
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
             <a href="view_downline_chart.php?user_value=<?php echo $username_array[12]?>"><?php echo ucwords($name_array[12])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[13]!='')
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
             <a href="view_downline_chart.php?user_value=<?php echo $username_array[13]?>"><?php echo ucwords($name_array[13])?> </a></td>
              <?php }
					else
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_none.png" height="80px" class="classForHoverEffect" /><br>
                (Open)</td>
              <?php }?>
              <?php if($name_array[14]!='')
					{?>
              <td colspan="1" align="center"><img src="../images/down_icon_right_2.png" height="80px" class="classForHoverEffect" /><br>
              <a href="view_downline_chart.php?user_value=<?php echo $username_array[14]?>"><?php echo ucwords($name_array[14])?> </a></td>
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
