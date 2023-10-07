<html>
  <head>
    <title>
      Submit
    </title>
    <style>
      body{
        background-image: url('firstpage.jpg');
        background-size: cover;
      }
      .success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
}
        .success {
        background-color: #c3e6cb;
        padding: 20px;
        border-radius: 10px;
        margin: 20px auto;
        max-width: 500px;
    }
    
    .error {
        background-color: #f5c6cb;
        padding: 20px;
        border-radius: 10px;
        margin: 20px auto;
        max-width: 500px;
    }
    
    a {
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        background-color: #28a745;
        padding: 10px 20px;
        border-radius: 5px;
        display: inline-block;
        margin-top: 20px;
    }
    .welcome {
        font-size: 2em;
        margin-bottom: 20px;
    }
    </style>
  </head>
</html><?php
  // Connect to database
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'Placement_cell';
  $conn = mysqli_connect($host, $user, $password, $database);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Process form data
  session_start();
  if (isset($_SESSION["data"])) {
  $data = $_SESSION["data"];
  //unset($_SESSION["data"]);
  }
  if (isset($_SESSION["data1"])) {
  $data1 = $_SESSION["data1"];
  //unset($_SESSION["data1"]);
  }
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    //$id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $applied_post = $_POST['applied_post'];
    $skills = $_POST['skills'];
    $description = $_POST['description'];
    $pdfname=$_FILES['resume']['name'];
    $pdftemp=$_FILES['resume']['tmp_name'];
    $pdffolder='resumeuploads/'.$pdfname;
  // Insert data into database
  $sql = "INSERT INTO application (opportunity_id,stu_id,name, email, course, applied_post, skills, description,resume)
          VALUES ($data,$data1,'$name', '$email', '$course', '$applied_post', '$skills', '$description','$pdfname')";
  if (mysqli_query($conn, $sql)) {
    //echo "<div class='welcome'><br><br><br>Application submitted successfully.</div>";
    move_uploaded_file($pdftemp,$pdffolder);
    $url="student_dashboard.html";
    echo "<div class='success'><h3>Application Submitted Successfully</h3><br><a href='$url'>Go To Home Page</a></div>";
  } else {
    echo "<div class='error'>Error 404: " . $conn->error . "</div>";
}    

  // Close database connection
  mysqli_close($conn);
}
?>