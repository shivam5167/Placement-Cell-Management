<!DOCTYPE html>
<html>
<head>
	<title>Opportunities List</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f7f7f7;
			margin: 0;
			padding: 0;
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
	<h1>INTERNSHIPS/JOBS YOU HAVE APPLIED FOR</h1>
	<table>
		<tr>
			<th>Opportunity ID</th>
			<th>Company ID</th>
			<th>Post</th>
			<th>Type</th>
			<th>Company</th>
		</tr>

		<?php
			// Connect to the database
			$conn = mysqli_connect("localhost", "root", "", "Placement_cell");

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
            session_start();
            if (isset($_SESSION["data1"])) {
	        $data1 = $_SESSION["data1"];
            }
			// Query the database
			$sql = "SELECT * FROM opportunity where opportunity_id in (select opportunity_id from application where stu_id=$data1)";
			$result = mysqli_query($conn, $sql);

			// Check if there are any records
			if (mysqli_num_rows($result) > 0) {
				// Output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$row["opportunity_id"]."</td>";
					echo "<td>".$row["company_id"]."</td>";
					echo "<td>".$row["post"]."</td>";
					echo "<td>".$row["type"]."</td>";
					echo "<td>".$row["company"]."</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan='5'>You Have not applied yet.</td></tr>";
			}

			// Close the connection
			mysqli_close($conn);
		?>
	</table>
</body>
</html>