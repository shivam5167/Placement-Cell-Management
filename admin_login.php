<html>
<head>
<title>
Login Validation
</title>
<style>
    body{
        background-image: url('firstpage.jpg');
        background-size: cover;
        text-align:center;
        font-weight:bold;
        font-family:algerian;
        font-size:40px;
    }
    
    .welcome {
        font-size: 2em;
        margin-bottom: 20px;
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
<body>
<?php
    $connection = mysqli_connect("localhost" , "root" , "" , "Placement_cell")
        or die ("Couldn't connect to server");

    $query = "SELECT * FROM admin";
    $result = mysqli_query($connection,$query);
    $flag=0;
    if (mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            if($_REQUEST["username"] == $row['username'] &&
                $_REQUEST["password"] == $row['password'])
            {
                session_start();
                $data1= $row['id'];
                $_SESSION["data1"] = $data1;
                echo "<div class='welcome'>Welcome: " , $row['username'] , "</div>";
                $flag = 1; 
                //$url="student_dashboard.html";
                //echo "<div class='success'><h3>Logged In Successfully</h3><br><a href='$url'>Go To Dashboard</a></div>";
                header("location:admin_dashboard.html") ;             
            }   
        }
    }
    else
    {   
        $alert="Please login with correct information";
        echo "<script>alert($alert)</script>";
        header("location:login.html") ; 
    }

    if($flag == 0)
    {
        $alert="Please login with correct information";
        echo "<script>alert($alert)</script>";
        header("location:login.html") ; 
    }
?>
</body>
</html>