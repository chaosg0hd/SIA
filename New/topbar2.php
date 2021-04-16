<style>
.topbar2 {
  width: 100%;
}

.topbar2	ul{
  list-style-type: none;margin: 0;padding: 0 51px;overflow: hidden;background-color: #5f6e3c;
  width: 100%;
}
.topbar2    li{
    float: left;
  }
.topbar2  li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
.topbar2 li a:hover {
  background-color: #94b454;
}
</style>

<nav class="navbar navbar-light fixed-top bg-primary" style="padding:0;min-height:5rem;font-size: 15px;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  		
  		</div>
      <div class="col-md-4 float-left text-white">
      <img src="cocolimelogo.png" width="150" height="50">
        <large><b>Coco Lime Management System</b></large>
      </div>
	  	<div class="col-md-2 float-right text-white">
	  		<a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
    <div class="topbar2">
  <ul>
  <li><a href="#" style="font-size: 12.5px;">Customer Management</a></li>
  <li><a href="#" style="font-size: 12.5px;">Point of Sale</a></li>
  <li><a href="#" style="font-size: 12.5px;">Menu Management</a></li>
  <li><a href="#" style="font-size: 12.5px;">Inventory Management</a></li>
  <li><a href="#" style="font-size: 12.5px;">Daily Time Record Management</a></li>
  <li><a href="#" style="font-size: 12.5px;">Payroll Management</a></li>
  <li><a href="#" style="font-size: 12.5px;">Marketing Management</a></li>
  <li><a href="#" style="font-size: 12.5px;">Navigation</a></li>
</ul>
</div>
  </div>
  
  
</nav>