<!DOCTYPE html>
<head>
	<title>Placement Cell Data</title>
	<style>
		 .update-btn {
  position: absolute;
  top: 20px;
  right: 100px;
  margin-right: 100px;
  background-color:green; /* Set background color */
  color: white; /* Set text color */
  padding: 10px 20px; /* Set padding */
  border: none; /* Remove border */
  border-radius: 5px; /* Rounded corners */
  font-size: 16px; /* Set font size */
  cursor: pointer; /* Change mouse cursor on hover */
}

.update-btn a {
  color: white; /* Set text color */
  text-decoration: none; /* Remove underline */
}

.update-btn:hover {
  background-color: red; /* Darker background color */
}

.update-btn a:hover {
  color: #eeeeee; /* Change text color on hover */
  text-decoration: underline; /* Add underline on hover */
}
        body {
			font-family: Arial, sans-serif;
			background-color: #f7f7f7;
			margin: 0;
			padding: 0;
			background-image: url('firstpage.jpg');
      background-size: cover;
		}

		h1 {
			text-align: center;
			margin-top: 50px;
			color: #555;
		}

		table {
			margin: 50px auto;
			border-collapse: collapse;
			width: 80%;
			background-color: #fff;
			box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
		}

		th, td {
			padding: 15px 20px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		th {
			background-color: #f2f2f2;
			font-weight: bold;
			color: #555;
			text-transform: uppercase;
			letter-spacing: 1px;
		}

		tr:hover {
			background-color: #f5f5f5;
		}

		td:first-child {
			color: #555;
			font-weight: bold;
		}

		td:nth-child(2) {
			font-style: italic;
			color: #999;
		}

		td:last-child {
			text-transform: capitalize;
		}
	</style>
</head>
<body> 
	<center><u><h2>PROFILE</h2></u></center>
	<a href="updateprofile.html" class="update-btn">Update Profile</a>
	<table>
		<?php
		$servername = "localhost"; 
		$username = "root"; 
		$password = ""; 
		$dbname = "Placement_cell";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
        session_start();
        if (isset($_SESSION["data1"])) {
	    $data1 = $_SESSION["data1"];
	    //unset($_SESSION["data1"]);
       }
		$result = mysqli_query($conn,"SELECT id, name, email, cgpa, department, batch_year FROM users WHERE id='$data1'");
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<tr><th>ID</th><td>".$row["id"]."</td></tr><tr?><th>Name</th><td>".$row["name"]."</td></tr><tr><th>Email</th><td>".$row["email"]."</td></tr><tr><th>CGPA</th><td>".$row["cgpa"]."</td></tr><tr><th>Department</th><td>".$row["department"]."</td></tr><tr><th>Batch Year</th><td>".$row["batch_year"]."</td></tr>";
		    }
		} else {
		    echo "<tr><td colspan='6'>0 results</td></tr>";
		}
		$conn->close();
		?>
	</table>
</body>
</html>