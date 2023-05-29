<script>
var msg = "<?php  echo $msg;?>";
if(msg!="")
{
	alert(msg);
}
</script>

<header class="main-header"> 
  
  <!-- Logo --> 
  <a href="index.php" class="logo"> 
  <!-- mini logo for sidebar mini 50x50 pixels --> 
  <!--<span class="logo-mini"><b>A</b>LT</span>--> 
  <!-- logo for regular state and mobile devices --> 
  <span class="logo-lg">Relation AtoZ Group</span> </a> 
  
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation"> 
    <!-- Sidebar toggle button--> 
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a> 
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
       
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">  <span class="hidden-xs">
        Welcome,  <?=strtoupper($_SESSION['log_name']);?> !
          </span> </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
             <div>
                <?=$_SESSION['log_name'];?>
              <div>
              Tag :  <?=$_SESSION['log_tag'];?>
                
                </div>
                <div>
                DID :
                <?=$_SESSION['log_did']?>
                </div>
                 </div>
            </li>
            <!-- Menu Body -->
            
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-right"> <a href="logout.php" class="btn btn-default btn-flat">Sign out</a> </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
