<!-- Left side column. contains the logo and sidebar -->

<aside class="main-sidebar"> 
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar"> 
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image"> &nbsp; </div>
      <div class="pull-left info">
        <p>
          <?=$_SESSION['log_name'];?>
        </p>
        <small>
        <?=$_SESSION['log_tag'];?>
        </small> </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MY ACCOUNT</li>
      <li class="active"><a href="index.php"><i class="fa fa-circle-o text-red"></i> <span>Dashboard</span></a></li>
      <li class="treeview"> <a href="#"> <i class="fa fa-user"></i> <span>Profile</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li><a href="edit_profile.php"><i class="fa fa-circle-o"></i>View/Update</a></li>
          <li><a href="my_invoices.php"><i class="fa fa-circle-o"></i>My Invoices</a></li>
        </ul>
      </li>
      
      <li class="treeview"> <a href="#"> <i class="fa fa-users"></i> <span>My Organization</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
<!--         <li><a href="new_registration.php"><i class="fa fa-circle-o"></i>New Registration</a></li>
-->          <li><a href="organization_chart.php"><i class="fa fa-circle-o"></i>Organization Chart</a></li>
          <li><a href="organization_list.php"><i class="fa fa-circle-o"></i>Organization List</a></li>
          <li><a href="my_directs.php"><i class="fa fa-circle-o"></i>My Directs</a></li>
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-internet-explorer"></i> <span>Epins Management</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li><a href="request_new_epins.php"><i class="fa fa-circle-o"></i>Request New Epins</a></li>
          <li><a href="remaining_epins.php"><i class="fa fa-circle-o"></i>Remaining Epins</a></li><!--
          <li><a href="pending_epin_requests.php"><i class="fa fa-circle-o"></i>Pending Epin Requests</a></li>-->
          <li><a href="used_epins.php"><i class="fa fa-circle-o"></i>Used Epins</a></li>
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa  fa-rss"></i> <span>Incomes/Achievements</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i>Income Details</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>Rewards Won</a></li>
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa  fa-user-plus"></i> <span>Sales</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i>Summary</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>Ongoing Session</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>Last Session</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>This Month</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>Expiring Sales</a></li>
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa  fa-transgender-alt "></i> <span>RelationAtoz</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i>Highest Achievers</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>Rewards Announced</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>Rewards Achievers</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i>Meetings & Seminars</a></li>
          <li> <a href="#"><i class="fa fa-circle-o"></i>Tag Holders <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Crown Ambassador</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Ambassador</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Sapphire</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Platinum</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Diamond</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Topaz</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Emeralnd</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Ruby</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Pearl</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Gold</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Silver</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Active</a></li>
              
            </ul>
          </li>
        </ul>
      </li>
      <li><a href="support_center.php"><i class="fa fa-mail-forward text-green"></i> <span>Support Center</span></a></li>
      <li><a href="logout.php"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar --> 
</aside>
