<?php
	include 'includes/session.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Daily Time Record System</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../dist/css/print.css" media="print">
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
		<br>
      <b style="font-family:'Courier New', Courier, monospace; font-size:50px; margin-left:270px;">EMPLOYEES ATTENDANCE</b>
      <table class="table table-bordered print">
        <thead>
          <tr>
		 	 <th style="font-family:'Courier New', Courier, monospace;">NO.</th>
            <th style="font-family:'Courier New', Courier, monospace;">DATE</th>
            <th style="font-family:'Courier New', Courier, monospace;">EMPLOYEE ID</th>
            <th style="font-family:'Courier New', Courier, monospace;">FIRST NAME</th>
            <th style="font-family:'Courier New', Courier, monospace;">LAST NAME</th>
			<th style="font-family:'Courier New', Courier, monospace;">TIME IN</th>
			<th style="font-family:'Courier New', Courier, monospace;">TIME OUT</th>
          </tr>
        </thead>
        <tbody>
          <?php
				$n=1;
				$sql="SELECT * FROM employees, attendance";
				$result=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_assoc($result))
		  {
          ?>
          <tr>
            <td><?php echo $n; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['employee_id']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
			<td><?php echo $row['lastname']; ?></td>
			<td><?php echo $row['time_in']; ?></td>
			<td><?php echo $row['time_out']; ?></td>
          </tr>
          <?php
          $n++;
			}
          ?>
        </tbody>
      </table>
	  <a href="home.php">
      <div class="text-right">
	  <a href="attendance.php"><button style="font-family:'Courier New', Courier, monospace;" class="btn btn-danger" id="print-btn">BACK</button>
		<button style="font-family:'Courier New', Courier, monospace;" onclick="window.print();" class="btn btn btn-success btn-flat" id="print-btn">PRINT</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>