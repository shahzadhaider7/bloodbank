<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/popper.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<title>Blood Bank Online</title>
</head>

<body style="background-image: url(images/bg.jpg);
	background-size: cover;">

	<?php
		require_once("connection.php");
	?>
	

<div class="background_class">
	<div>

		<div class="top_right_corner" style="float: right;">
			<?php 
			if(isset($_SESSION['username']))
			{ 
			?>
				<a href="account.php" style="color: white; font-size: 20px;"><img src="icons/person.png"> My account</a>&nbsp;&nbsp;&nbsp;
				<a href="signout.php" style="color: white; font-size: 20px;"><img src="icons/logout.png"> Sign Out</a>&nbsp;
			<?php
			}
			else
			{
			?>
				<a href="signup.php" style="color: white; font-size: 20px;"><img src="icons/person.png"> Sign Up</a>&nbsp;&nbsp;&nbsp;
      			<a href="signin.php" style="color: white; font-size: 20px;"><img src="icons/login.png"> Sign In</a>&nbsp;
      		<?php
			}
			?>
      	</div>


	<nav class="navbar navbar-expand-lg navbar-dark">
      			<a class="navbar-brand px-3 bg_image" href="#"><img src="images/blood_drop_new.png" width = "100px" height = "100px"></a>
      			<h1 class="website_name">Blood Bank Online</h1>
      			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=#mainmenu>
      			<span class="navbar-toggler-icon"></span>      				
      			</button>

      	
      	<div class="collapse navbar-collapse" id="mainmenu">
    		<ul class="navbar-nav topnav">
      			<li class="nav-item px-3"><a href="index.php" class="nav-link">Home</a></li>
      			<li class="nav-item px-3"><a href="blood_donors.php" class="nav-link">Blood Donors</a></li>
      			

      			
      			<li class="nav-item dropdown px-3">
      				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Services</a>

      			<div class="dropdown-menu">
        				<a class="dropdown-item" href="#">Blood Donations</a>
        				<a class="dropdown-item" href="#">Money Donations</a>
        				<a class="dropdown-item" href="#">Food Donations</a>
        				<a class="dropdown-item" href="#">Treatments</a>
      			</div>
      			</li>

      			<li class="nav-item px-3"><a href="support.php" class="nav-link">Support us</a></li>
      			<li class="nav-item px-3"><a href="about.php" class="nav-link">About</a></li>
      			<li class="nav-item px-3" data-toggle="modal" data-target="#contact_Modal"><a href="#" class="nav-link">Contact</a>


      			<div id="contact_Modal" class="modal" role="dialog">
      				<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Blood Bank Online</h4>
								<button type="button" class="close" data-dismiss="#">&times;</button>
							</div>
							
							<div class="modal-body">
								<p align="center">
									<i>You will find us in the heart of those poor and needy people, whom we helped just because of humanity.</i><br><br>
									If you have any question or suggestion, feel free to contact us on the following mail address or contact number.<br><br>
									Email : bloodbankonline@gmail.com<br>
									Contact No. : 0307-8404026<br>
								</p>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="#">Close</button>
								<button type="button" class="btn btn-info" data-dismiss="#">&emsp;&emsp; Save &emsp;&emsp;</button>

							</div>
						</div>      					
      				</div>
      				

      			</div>

      			</li>
      			</ul>
    	</div>
    		
	</nav>
</div>



</div>


<div align="center">
	<h3>Search here</h3>
	<!-- form for the search box -->
	<form name="searchform" method="post" action="#">
		Name <input type="text" name="namesearch" placeholder="Enter Name">
		Blood group <input type="text" name="bloodgroupsearch" placeholder="Enter Blood Group">
		Location <input type="text" name="locationsearch" placeholder="Enter City or Town"><br><br>
		<input type="hidden" name="searchbutton">
		<input type="submit" name="submit" value="Search"><br><br>
	</form>
</div>


	<?php
		require_once("connection.php");  // Establishing connection
		
		if(isset($_POST['searchbutton']))
		{
			
			// in query wildcard (%) has been used means relative to text entered in the searchbox
			$query = "SELECT * FROM blood_donors WHERE name LIKE '%".$_POST['namesearch']."%' OR '%".$_POST['bloodgroupsearch']."%'";
			$result = mysqli_query($conn,$query);
			$num = mysqli_num_rows($result);
		
			if($num <= 0)  // if no record found then echo a message to the user.
				{
				?>
					<br><h3 align="center">Sorry No Record Found!</h3><br><br>
				<?php
					conn_close();
				}
			else  // if record found then display in tabular format
				{
					
					?>
					<div class="container-fluid">
					<table border="1" class="table">
						<th>Name</th>
						<th>Blood Group</th>
						<th>Gender</th>
						<th>Contact</th>
					<?php
						while($row = mysqli_fetch_assoc($result))
							{
								echo "<tr><td>".$row['name']."</td><td>".$row['bloodgroup']."</td><td>".$row['gender']."</td><td>".$row['phone']."</td></tr>";
							}
						echo "</table></div>";
						conn_close();
				}			
		}		
	?>


		<div style="/*position: fixed;
  bottom: 0px;*/
  color: lightgrey;
  text-align: center;
  height: auto;
  background-color: grey;
  width: 100%;
  padding: 20px;
  ">
			<p>Designed and developed by Shahzad Haider of CSE Batch-15, UET Mardan.<br> Copyrights &copy All rights reserved.</p>
		</div>


</body>
</html>