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
      <li class="header text-white">MY ACCOUNT</li>
      <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="treeview"> <a href="#"> <i class="fa fa-user"></i> <span>User Profile</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li><a href="select_user_detail.php?action=edit_profile"><i class="fa fa-circle-o"></i>View/Edit Profile</a></li>
          <li><a href="select_user_detail.php?action=change_password"><i class="fa fa-circle-o"></i>Change Password</a></li>
             
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-users"></i> <span>Organisation</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
 	 <li><a href="select_user_detail.php?action=view_downline_chart"><i class="fa fa-circle-o"></i>View Downline Chart</a></li>
          <li><a href="select_user_detail.php?action=view_downline_list"><i class="fa fa-circle-o"></i>View Downline List</a></li>             
        </ul>
      </li>
      
      
        
      <li class="treeview"> <a href="#"> <i class=" fa fa-internet-explorer"></i> <span>Epins Management</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li><a href="received_epins.php"><i class="fa fa-circle-o"></i>Recieved Epins</a></li>
          <li><a href="unused_epins.php"><i class="fa fa-circle-o"></i>Issued & Unused Epins</a></li>
          <li><a href="used_epins.php"><i class="fa fa-circle-o"></i>Used Epins</a></li>
        </ul>
      </li>
      <!--<li class="treeview"> <a href="#"> <i class="fa fa-dashboard"></i> <span>Gyan Holidays</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li><a href="achievers.php"><i class="fa fa-circle-o"></i>Highest Achievers</a></li>
          </ul>
      </li>-->
    <!--  <li class="treeview"> <a href="#"> <i class="fa fa-dashboard"></i> <span>My Organization</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li><a href="organization_chart.php"><i class="fa fa-circle-o"></i>Organization Chart</a></li>
          <li><a href="organization_list.php"><i class="fa fa-circle-o"></i>Organization List</a></li>
          <li><a href="my_directs.php"><i class="fa fa-circle-o"></i>My Directs</a></li>
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-dashboard"></i> <span>Incomes/Achievements</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li><a href="invoice_detail.php.html"><i class="fa fa-circle-o"></i>Income Details</a></li>
          <li><a href="index2.html"><i class="fa fa-circle-o"></i>Rewards Won</a></li>
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-dashboard"></i> <span>Sales</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li><a href="index.html"><i class="fa fa-circle-o"></i>Summary</a></li>
          <li><a href="index.html"><i class="fa fa-circle-o"></i>Ongoing Session</a></li>
          <li><a href="index2.html"><i class="fa fa-circle-o"></i>Last Session</a></li>
          <li><a href="index2.html"><i class="fa fa-circle-o"></i>This Month</a></li>
          <li><a href="index2.html"><i class="fa fa-circle-o"></i>Expiring Sales</a></li>
        </ul>
      </li>
      <li class="treeview"> <a href="#"> <i class="fa fa-dashboard"></i> <span>Gyan Holidays</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li><a href="achievers.php"><i class="fa fa-circle-o"></i>Highest Achievers</a></li>
          <li><a href="index.html"><i class="fa fa-circle-o"></i>Rewards Announced</a></li>
          <li><a href="index2.html"><i class="fa fa-circle-o"></i>Rewards Achievers</a></li>
          <li><a href="index2.html"><i class="fa fa-circle-o"></i>Meetings & Seminars</a></li>
          <li><a href="index2.html"><i class="fa fa-circle-o"></i>Tag Holders</a></li>
        </ul>
      </li>
      <li><a href="support_center.php"><i class="fa fa-mail-forward text-green"></i> <span>Support Center</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>-->
    </ul>
  </section>
  <!-- /.sidebar --> 
</aside>
