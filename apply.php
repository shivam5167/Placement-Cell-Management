<!DOCTYPE html>
<html>
<head>
	<title>Job Opportunities</title>
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
	<h1>Opportunities</h1>
	<table>
		<tr>
			<th>Opportunity ID</th>
			<th>Company ID</th>
			<th>Post</th>
			<th>Type</th>
			<th>Company</th>
			<th>Action</th>
		</tr>
		<?php
			// Connect to the database
			$conn = mysqli_connect("localhost", "root", "", "Placement_cell");
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			// Fetch data from the opportunity table
			$sql = "SELECT * FROM opportunity";
			$result = mysqli_query($conn, $sql);
			session_start();
			// Loop through the data and display it in the table
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row["opportunity_id"] . "</td>";
				echo "<td>" . $row["company_id"] . "</td>";
				echo "<td>" . $row["post"] . "</td>";
				echo "<td>" . $row["type"] . "</td>";
				echo "<td>" . $row["company"] . "</td>";
				//session_start();
			    $data= $row['opportunity_id'];
                $_SESSION["data"] = $data;
				echo "<td><a href=\"application.html\">Apply</a></td>";
				echo "</tr>";
			}
			// Close the database connection
			mysqli_close($conn);
		?>
	</table>
</body>
</html>