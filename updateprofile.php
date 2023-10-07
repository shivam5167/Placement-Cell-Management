<html>
    <head>
        <title>Update Profile</title>
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
</style>
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cgpa = $_POST['cgpa'];
    $department = $_POST['department'];
    $batch_year = $_POST['batch_year'];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Placement_cell";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();
    $data1 = $_SESSION["data1"];

    // Prepare and execute the update query
    $query = "UPDATE users SET name='$name', email='$email', cgpa='$cgpa', department='$department', batch_year='$batch_year' WHERE id=$data1";
    if ($conn->query($query) === TRUE) {
        $url = "student_dashboard.html";
        echo "<div class='success'><h3>Profile Updated Successfully</h3><br><a href='$url'>Go To Dashboard</a></div>";
    } else {
        echo "<div class='error'>Error updating record: " . $conn->error . "</div>";
    }    
    $conn->close();
}
?> 
</html>