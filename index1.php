<!DOCTYPE html>
<html lang="en">
<head>
	<title>PhoneBook</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap\css\bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap\css\bootstrap.min.css">
	<script type="text/javascript" src="bootstrap\js\bootstrap.js"></script>
	<script type="text/javascript" src="bootstrap\js\bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="jumbotron">
		<h1>PhoneBook</h1>
	</div>
</div>
<br>
<div class="container">
	<div class="col-xs-6">
	<form action="index1.php" method="POST">
		<div class="col-xs-3">
			<label>Name</label>
		</div>
		<div class="col-xs-9">
			<input type="text" name="username1" class="form-control"></input>
		</div>
		<div class="col-xs-12" style="height: 10px">
		</div>
		<div class="col-xs-3">
			<label>Phone no.</label>
		</div>
		<div class="col-xs-9">
			<input type="text" name="mobno1" class="form-control"></input>
		</div>
		<div class="col-xs-12" style="height: 20px">
		</div>
		<div class="col-xs-3"></div>
		<div class="col-xs-6">
			<input type="submit" name="save" value="Save" class="btn btn-default" style="width: 200px"></input>
		</div>
		<div class="col-xs-3"></div>
		<div class="col-xs-12" style="height: 10px">
		</div>
	</form>
	<div class="col-xs-12">
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "phonebook";
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	if(isset($_POST['username1']))
	{	$name=$_POST['username1'];
		$mob=$_POST['mobno1'];
			if(!($name=='') && !($mob==''))
			{
				if (!$conn) {
    				die("Connection failed: " . mysqli_connect_error());
				}
				$sql = "INSERT INTO directory (name,mobile) VALUES('".$name."','".$mob."')";

				if (mysqli_query($conn, $sql)) {
    				echo "<p>New record created successfully</p>";
				} else {
    				echo "<div>Error: " . $sql . "<br>" . mysqli_error($conn)."</div>";
				}
			}
			else
				echo "Enter name and phone number.";		
	}
		mysqli_close($conn);
	?>
	</div>
	</div>	
	<div class="col-xs-6">
	<form action="index1.php" method="post">
		<div class="col-xs-3">
			<label>Name</label>
		</div>
		<div class="col-xs-9">
			<input type="text"  name="username2" class="form-control"></input>
		</div>
		<div class="col-xs-12" style="height: 10px">
		</div>
		<div class="col-xs-3">
			<label>Phone no.</label>
		</div>
		<div class="col-xs-9">
			<input type="text" name="mobno2" class="form-control"></input>
		</div>
		<div class="col-xs-12" style="height: 20px">
		</div>
		<div class="col-xs-3"></div>
		<div class="col-xs-6">
			<input type="submit" name="search" value="Search" class="btn btn-default" style="width: 200px"></input>
		</div>
		<div class="col-xs-3"></div>
		<div class="col-xs-12" style="height: 10px">
		</div>
	</form>
	<div class="col-xs-12">
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "phonebook";
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	if(isset($_POST['username2']) || isset($_POST['mobno2']))
	{
		$name=$_POST['username2'];
		$mob=$_POST['mobno2'];
		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}
		if(!($name==''))
		{
			$sql = "SELECT * FROM directory WHERE name like('".$name."%')";
			$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0) {
				echo "<div class=\"well well-sm\"><table class=\"table table-hover\">
						<tr>
							<th>Name</th>
							<th>Phone no</th>
						</tr>";
  				while($row = mysqli_fetch_assoc($result)) {
        			echo "<tr>
        					<td>".$row["name"]."</td>
        					<td>".$row["mobile"]."</td>
        				  </tr>";
    			}
    			echo "</table></div>";
    		}
    		else {
    			echo "0 results";
			}
		}
		else if(!($mob==''))
		{
			$sql = "SELECT * FROM directory WHERE mobile like('".$mob."%')";
			$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0) {
				echo "<div class=\"well well-sm\"><table class=\"table table-hover\">
						<tr>
							<th>Name</th>
							<th>Phone no</th>
						</tr>";
  				while($row = mysqli_fetch_assoc($result)) {
        			echo "<tr>
        					<td>".$row["name"]."</td>
        					<td>".$row["mobile"]."</td>
        				  </tr>";
    			}
    			echo "</table></div>";
    		}
    		else {
    			echo "0 results";
			}
		}
		else
			echo "Enter name or phone number to search.";
	}
		mysqli_close($conn);
	?>
	</div>
	</div>	
</div>
</body>
</html>