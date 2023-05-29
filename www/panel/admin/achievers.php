<?php require_once("../../../library/initialize.php");?>
<?php require("../../common/check_admin.php");?>
<?php require("../../../LIBRARY/admin.php");?>
<?php 
   $fetch_obj = new admin;
	if(isset($_POST['to_delete']))
	{
		if($_POST['to_delete']!="")
		{
			 $delete_epins = $fetch_obj->delete_achievers($_POST['to_delete']);
		
		}
	}
			$last_session = $fetch_obj->last_session_find();
			$DATA_SESSION = $last_session->fetch_assoc();
	 		$session = $DATA_SESSION['session'];
			$sql=$fetch_obj->achievers($DATA_SESSION['session']);

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
      <h1> Highest Achievers </h1>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <table style="width:100%;" class="table-responsive" border="1" cellspacing="5" cellpadding="5">
            <tr>
              <td align="center"><b>Achiever Pic</b></td>
              <td align="center"><b>Achiever Name</b></td>
              <td align="center"><b>Achiever Score</b></td>
              <td align="center">&nbsp;</td>
           <?php 
	   			while($DATA=$sql->fetch_assoc()){

		   ?>
            <tr>
              <td align="center"><img src="<?php echo  IMAGES_PATHS;?>/<?=$DATA['profile_pic'] ?>" class="img-circle" alt="User Image" height="100" width="100"></td>
              <td align="center"><?=$DATA['name']?></td>
              <td align="center"><?=$DATA['income']?> &nbsp;INR</td>
             <td align="center"> <a href="javascript:delete_achievers('<?php echo $DATA['table_id']?>')"><div class="btn btn-danger">Delete</div></a> </td>
            </tr>
            <? }?>
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
<form name="delete_form" method="post">
<input type="hidden"  value="none" name="to_delete" id="to_delete">
</form>
<script>
function delete_achievers(delet_id)
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
</script>

</body>
</html>
