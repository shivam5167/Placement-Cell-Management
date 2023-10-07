<!DOCTYPE html>
<head>
	<title>Companies</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			margin: 0;
			padding: 0;
            background-image: url('firstpage.jpg');
            background-size: cover;
		}

		h1 {
			text-align: center;
			margin: 20px 0;
			color: #333;
		}

		.container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			margin: 20px auto;
			max-width: 1200px;
		}

		.card {
			display: flex;
			flex-direction: column;
			align-items: center;
			background-color: #fff;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
			margin: 20px;
			width: 250px;
			height: 300px;
			overflow: hidden;
			border-radius: 5px;
			transition: transform 0.3s ease-in-out;
		}

		.card:hover {
			transform: translateY(-10px);
		}

		.logo {
			width: 100%;
			height: 200px;
			object-fit: cover;
			object-position: center;
		}

		.details {
			padding: 20px;
			text-align: center;
		}

		h2 {
			font-size: 20px;
			margin-bottom: 10px;
			color: #333;
		}

		p {
			font-size: 14px;
			color: #666;
			margin-bottom: 5px;
		}
	</style>
</head>
<body>
	<h1>Companies</h1>
	<div class="container">
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
			$sql = "SELECT * FROM company";

			// Execute the query and get the result set
			$result = mysqli_query($conn, $sql);

			// Loop through the rows in the result set and display them in a card
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<div class='card'>";
				echo "<img class='logo' src='" . $row['logo_image'] . "' alt='" . $row['company_name'] . "'>";
				echo "<div class='details'>";
				echo "<h2>" . $row['company_name'] . "</h2>";
				//echo "<p>" . $row['company_id'] . "</p>";
				echo "</div>";
				echo "</div>";
			}

			// Close the database connection
			mysqli_close($conn);
		?>
	</div>
</body>
</html>