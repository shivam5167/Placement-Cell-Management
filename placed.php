<!DOCTYPE html>
<html>
<head>
	<title>Placement Records</title>
	<style>
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
	<h1>Placement Records</h1>
	<table>
		<tr>
			<th>Student ID</th>
			<th>Name</th>
			<th>Course</th>
			<th>Company ID</th>
			<th>Company Name</th>
			<th>Post</th>
			<th>Year</th>
			<th>Semester</th>
			<th>Placed Date</th>
		</tr>
		<?php
			// Establish a connection to the database
			$host = "localhost";
			$user = "root";
			$password = "";
			$dbname = "Placement_cell";
			$conn = mysqli_connect($host, $user, $password, $dbname);

			// Check if the connection was successful
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			// Construct the SQL query
			$sql = "SELECT * FROM placement";

			// Execute the query and get the result set
			$result = mysqli_query($conn, $sql);

			// Loop through the rows in the result set and display them in a table
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['student_id'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['course'] . "</td>";
				echo "<td>" . $row['company_id'] . "</td>";
				echo "<td>" . $row['company_name'] . "</td>";
				echo "<td>" . $row['post'] . "</td>";
				echo "<td>" . $row['year'] . "</td>";
				echo "<td>" . $row['semester'] . "</td>";
				echo "<td>" . $row['placed_date'] . "</td>";
				echo "</tr>";
			}

			// Close the database connection
			mysqli_close($conn);
		?>
	</table>
</body>
</html>