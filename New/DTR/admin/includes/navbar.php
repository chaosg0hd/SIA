<header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>DTR</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="dtr"><b>Daily Time Record System</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-onlys"></span>
      </a>
      
      <div class="navbar-custom-menu">
        
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="name"><img src="../images/cocolime_vector1.png" alt="icon" width="30" height="30"></span>
            </a>
            <ul class="dropdown-menu">

            

              <!-- User image -->

              <li class="user-header">
                <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
                <p>
                <div class="administrator">
                  <?php echo $user['firstname'].' '.$user['lastname']; ?> <br>        
                  <small><b>ADMINISTRATOR</b></small>
              </div>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Update Account</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <br>
      <br>
      <br>
      <div class="topnav" id="myTopnav">
  <a href="#pos">Point of Sales</a>
  <a href="#ps">Payroll System</a>
  <a href="#crms">Customer Reception Management System</a>
  <a href="#ims">Inventory Management System</a>
  <a href="#mms">Menu Management System</a>
  <a href="home.php">Daily Time Record System</a>
  <a href="#fs">Finance System</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-plus"></i>
  </a>
</div>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
    </nav>
    
    </header>
    
  <?php include 'includes/profile_modal.php'; ?>