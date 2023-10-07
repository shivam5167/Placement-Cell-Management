<html>
  <head>
    <title>Login Page</title>
    <style>
     body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-image: url('firstpage.jpg');
    background-size: cover;
}

.login-box {
    width: 300px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    animation: slidein 1s ease-in-out;
}

@keyframes slidein {
    from {transform: translateY(-20px); opacity: 0;}
    to {transform: translateY(0); opacity: 1;}
}

h1 {
    text-align: center;
    transition: color 0.5s ease-in-out;
}

h1:hover {
    color: #4CAF50;
}

h3 {
    text-align: center;
    transition: color 0.5s ease-in-out;
}

h3:hover {
    color: #4CAF50;
}

form {
    flex-direction: column;
}

label {
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    transition: border-color 0.5s ease-in-out;
}

input[type="text"]:focus,
input[type="password"]:focus {
    border-color: #4CAF50;
}

button {
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.5s ease-in-out;
}

button:hover {
    background-color: #3e8e41;
}

a {
    color: #4CAF50;
    text-decoration: none;
    transition: color 0.5s ease-in-out;
}

a:hover {
    text-decoration: underline;
    color: #3e8e41;
}

    </style>
    <script>
      // Get the user and admin login forms
var userForm = document.getElementById("user-form");
var adminForm = document.getElementById("admin-form");

function userLogin() {
  // Get the input values
  var username = document.getElementById("user-username").value;
  var password = document.getElementById("user-password").value;

  // Check if the input values are valid
  if (username == "") {
    alert("Please enter your username.");
    return false;
  }
  else if (password == "") {
    alert("Please enter your password.");
    return false;
  }
  else{
    return true;
  }
}

function adminLogin() {
  // Get the input values
  var username = document.getElementById("admin-username").value;
  var password = document.getElementById("admin-password").value;
  if (username == "") {
    alert("Please enter your username.");
    return false;
  }
  if (password == "") {
    alert("Please enter your password.");
    return false;
  }
}
    </script>
  </head>
  <body>
    <div class="login-box">
      <h1>Login</h1>
      <form id="user-form"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return userLogin()">
        <h3>Login As User</h3>
        <label for="user-username">Username:</label>
        <input type="text" id="user-username" name="username" placeholder="Enter username">

        <label for="user-password">Password:</label>
        <input type="password" id="user-password" name="password" placeholder="Enter password">
        <button type="submit" name="user-form">Login</button>
      </form>
      
        <!-- <label for="name">Name:</label> -->
      <!--<form id="admin-form"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" onsubmit="return adminLogin()">
        <h3>Login As Admin</h3>
        <label for="admin-username">Username:</label>
        <input type="text" id="admin-username" name="username" placeholder="Enter username">

        <label for="admin-password">Password:</label>
        <input type="password" id="admin-password" name="password" placeholder="Enter password">

        <button type="submit" name="admin-form">Login</button>
      </form>-->
      <p>Don't have an account? <a href="signup.html">Sign up here</a></p>
    </div>
  </body>
</html>
<?php
    $connection = mysqli_connect("localhost" , "root" , "" , "Placement_cell")
        or die ("Couldn't connect to server");
    if(isset($_POST['admin-form'])) {
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
                //echo "<div class='welcome'>Welcome: " , $row['username'] , "</div>";
                $flag = 1; 
                //$url="student_dashboard.html";
                //echo "<div class='success'><h3>Logged In Successfully</h3><br><a href='$url'>Go To Dashboard</a></div>";
                header("location:admin_dashboard.html") ;             
            }   
        }
    }
    else
    {   
        $alert="Invalid Username Or Password";
        echo "<script>alert('$alert')</script>";
        //header("location:login.html") ; 
    }

    if($flag == 0)
    {
      $alert="Invalid Username Or Password";
        echo "<script>alert('$alert')</script>";
        //header("location:login.html") ; 
    }
  }
  if(isset($_POST['user-form'])) {
    $query = "SELECT * FROM users";
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
                //echo "<div class='welcome'>Welcome: " , $row['username'] , "</div>";
                $flag = 1; 
                //$url="student_dashboard.html";
                //echo "<div class='success'><h3>Logged In Successfully</h3><br><a href='$url'>Go To Dashboard</a></div>";
                header("location:student_dashboard.html") ;             
            }   
        }
    }
    else
    {   
        $alert="Invalid Username Or Password";
        echo "<script>alert('$alert')</script>";
        //header("location:login.html") ; 
    }

    if($flag == 0)
    {
      $alert="Invalid Username Or Password";
        echo "<script>alert('$alert')</script>";
        //header("location:login.html") ; 
    }
  }
?>