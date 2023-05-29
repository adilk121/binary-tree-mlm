<?php require("../../common/check_user.php");?>
<?php require("../../common/connection.php");?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php require("common/common_title.php");?></title>
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
          <h1>
            My Invoices
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
    <th style="width:30px;">S.NO</th>
    <th>INVOICE NO</th>
    <th>INVOICE DATE</th>
    <th>AMOUNT</th>
    <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      	<td>1</td>
                        <td>GH-16-10001</td>
                        <td>15-Mar-2016</td>
                        <td>&#8377; 7960/-</td>
                        <td><a href="invoice.php" target="_blank">Print</a></td>
                      </tr>
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
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <?php require("common/footer.php");?>

      

    </div><!-- ./wrapper -->
<?php require("common/footer_links.php");?>

  </body>
</html>
