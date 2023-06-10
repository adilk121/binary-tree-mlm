<?php require("../../common/check_user.php");?>
<?php require("../../common/connection.php");?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php require("common/common_title.php");
//header?></title>
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
            My Directs
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
                      <tr>
                        <td>1</td>
                        <td>akash_denwal</td>
                        <td>95846254</td>
                        <td>Aakash Denwal</td>
                        <td>9873698587</td>
                        <td>aakash_denwal@gmail.com</td>
                        <td>FSO</td>
                        <td>15-Mar-2016</td>
                        <td>Active</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>nitinbharadwaj2</td>
                        <td>87596857</td>
                        <td>Nitin Bharadwaj</td>
                        <td>8527987654</td>
                        <td>nitinbharadwaj@gmail.com</td>
                        <td>SSO</td>
                        <td>15-Mar-2016</td>
                        <td>Active</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>anuj2016</td>
                        <td>36589425</td>
                        <td>Anuj Lal</td>
                        <td>8800099759</td>
                        <td>anuj2016@gmail.com</td>
                        <td>SSO</td>
                        <td>15-Mar-2016</td>
                        <td>About To Expire</td>
                      </tr>
                      <tr>
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
