<?php require("../../common/check_user.php");?>
<?php require("../../../LIBRARY/user.php");?>
<?php 
         $fetch_obj = new user;
			$sql=$fetch_obj->achievers();
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
          <table style="width:100%;" border="1" cellspacing="5" cellpadding="5">
            <tr>
              <td align="center"><b>Achiever Pic</b></td>
              <td align="center"><b>Achiever Name</b></td>
              <td align="center"><b>Achiever Score</b></td>
           <?php 
	   			while($DATA=$sql->fetch_assoc()){

		   ?>
            <tr>
              <td align="center"><img src="<?php echo  IMAGES_PATHS;?>/<?=$DATA['profile_pic'] ?>" class="img-circle" alt="User Image" height="100" width="100"></td>
              <td align="center"><?=$DATA['name']?></td>
              <td align="center"><?=$DATA['income']?></td>
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
</body>
</html>
