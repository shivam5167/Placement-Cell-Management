<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $cgpa = $_POST['cgpa'];
  $department = $_POST['department'];
  $batchYear = $_POST['batch-year'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Connect to the database
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $dbname = 'Placement_cell';

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  // Check connection
  if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
  }

  // Save the form data to the database
  $sql = "INSERT INTO users (id, name, email, cgpa, department, batch_year, username, password)
          VALUES ('$id', '$name', '$email', '$cgpa', '$department', '$batchYear', '$username', '$password')";

  if (mysqli_query($conn, $sql)) {
    $url="login.php";
    $url2="firstpage.jpg";
    //echo "<html><head><style>body{ text-align :center; background-image: url($url2);background-size: cover;} </style></head><body><h1>Signed Up Sucessfully</h1><br><a href=$url><h1>Go To Login Page</h1></a></body></html>";
   $alert="Signed Up Successfully";
   echo "<script>alert('$alert')</script>";
    header("Location:login.php");
  } else {
    echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
  }
  // Close the database connection
  mysqli_close($conn);
}
?>