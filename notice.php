<html>
  <head>
    <title>Notice Board</title>
    <style>
     /* Style for the notice board section */
     /* Style for the notice board section */
.notice-board {
  background-color: #f5f5f5;
  padding: 20px;
  margin-top: 20px;
}

.notice {
  border: 1px solid #ddd;
  background-color: #fff;
  margin-bottom: 20px;
  padding: 10px;
  animation: slideIn 0.5s ease;
  position: relative;
  overflow: hidden;
}

.notice h3 {
  margin-top: 0;
  font-size: 1.2em;
  font-weight: bold;
  color: #333;
  position: relative;
  display: inline-block;
  animation: colorChange 5s ease-in-out infinite;
}

.notice:hover h3 {
  animation-play-state: paused;
}

.notice p {
  margin: 0;
  color: #333;
  position: relative;
  display: inline-block;
  animation: colorChange 5s ease-in-out infinite;
}

.notice:hover p {
  animation-play-state: paused;
}

.notice .date {
  font-style: italic;
  font-size: 0.8em;
  color: #666;
  position: relative;
  display: inline-block;
  animation: colorChange 5s ease-in-out infinite;
}

.notice:hover .date {
  animation-play-state: paused;
}

@keyframes slideIn {
  0% {
    opacity: 0;
    transform: translateX(-100%);
  }
  100% {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes colorChange {
  0% {
    color: #333;
    transform: translateX(0);
  }
  50% {
    color: #4CAF50;
    transform: translateX(100%);
  }
  100% {
    color: #333;
    transform: translateX(0);
  }
}
    </style>
  </head>
  <body>
  <div class="notice-board">
  <h2>Notice Board</h2>
  <?php
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "Placement_cell");

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Query to select all notices
    $sql = "SELECT * FROM notice";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if any notices exist
    if (mysqli_num_rows($result) > 0) {
      // Display each notice
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='notice'>";
        //echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['content'] . "</p>";
        echo "<p class='date'>Posted on " . $row['date'] . "</p>";
        echo "</div>";
      }
    } else {
      echo "<p>No notices found.</p>";
    }
    // Close the database connection
    mysqli_close($conn);
  ?>
</div>
</body>   
</html> 