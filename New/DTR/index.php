<?php session_start(); ?>
<?php include 'header.php'; ?>
<?php header('Refresh: 20'); ?>
<body class="hold-transition login-page">

<div class="img">
  <img src="images/cocolime.png" alt="Coco lime" style="width:100%">
  </div>

  		<h1 id="date"></h1>
      <h2 id="time" class="bold"></h2>
  
  	<div class="login-box-body">
    	<h4 class="login-box-msg">EMPLOYEE ID</h4>

<div class="container">
    	<form id="attendance">
          <div class="status">
            <select class="form-control" name="status">
              <option value="in">TIME IN</option>
              <option value="out">TIME OUT</option>
            </select>
          </div>
      		<div class="status">
        		<input type="text" class="form-control input-lg" id="employee" name="employee" required>
      		</div>

    
      		<div class="row">
          			<button type="submit" class="button" name="button"><i class="fa fa-sign-in"></i>CONFIRM</button>
        		</div>

       
		<div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
    </div>
		<div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
    </div>
      		</div>
</div>
    	</form>
	
<?php include 'scripts.php' ?>
<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  $('#attendance').submit(function(e){
    e.preventDefault();
    var attendance = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'attendance.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
        }
        else{
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#employee').val('');
        }
      }
    });
  });
    
});
</script>
</body>
</html>