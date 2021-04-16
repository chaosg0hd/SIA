<nav class="navbar navbar-light fixed-top bg-primary" style="padding:2; min-height:3.5rem">
  <div class="container-fluid mt-2 mb-2">

  	<div class="col-lg-12">
  	    <div class="col-md-1 float-left" style="display: flex;">
  		
  	    </div>
        <div class="col-md-6 float-left text-white">
            <img src="./Assets/Cocolime_Logo.png" width="80" height="40">
            <large><b>Cocolime Restaurant Management System</b><i></large>
        </div>
	  	<div class="col-md-2 float-right text-white">
	  		<a href="./Database/ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>

    <div class="col-md-6">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <button type="button" class="btn btn-outline-primary">Customer Management</button>
            <button type="button" class="btn btn-outline-primary">Point of Sale</button>
            <button type="button" class="btn btn-outline-primary">Menu Management</button>
            <button type="button" class="btn btn-outline-primary">Inventory Management</button>
            <button type="button" class="btn btn-outline-primary">Daily Time Record Management</button>
            <button type="button" class="btn btn-outline-primary">Payroll Management</button>
            <button type="button" class="btn btn-outline-primary">Marketing Management</button>
            <button type="button" class="btn btn-outline-primary">Navigation Page</button>
        </div>
    </div>
  </div>
  
</nav>