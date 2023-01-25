<?php 
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login Page</title>
        <link rel="stylesheet" href="css/AdminLogin.css" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="parallax">
                <nav id="navbar">
                    <div id="logo">
                        <!-- <img src="logo.png" alt="MyOnlineMeal.com"> -->
        
                    </div>
                    <ul>
                        <li class="item"><a href="home.php">Home</a></li>
                        <li class="item"><a href="club.php">Club</a></li>
                        <li class="item"><a href="event.php">Events</a></li>
                        <li class="item"><a href="StudentLogin.php">Student Login</a></li>
                        <li class="item"><a href="AdminLogin.php">Admin Login</a></li>
                        <li class="item"><a href="logout.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <center>
            <form action="AdminLogin.php" method="post">
                <div class="login-div">
                    <div class="logo"></div>
                    <div class="title">Admin Login Form</div>
                    <div class="sub-title"></div>
                    <div class="fields">
                        <div class="username">
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path d="M17.388,4.751H2.613c-0.213,0-0.389,0.175-0.389,0.389v9.72c0,0.216,0.175,0.389,0.389,0.389h14.775c0.214,0,0.389-0.173,0.389-0.389v-9.72C17.776,4.926,17.602,4.751,17.388,4.751 M16.448,5.53L10,11.984L3.552,5.53H16.448zM3.002,6.081l3.921,3.925l-3.921,3.925V6.081z M3.56,14.471l3.914-3.916l2.253,2.253c0.153,0.153,0.395,0.153,0.548,0l2.253-2.253l3.913,3.916H3.56z M16.999,13.931l-3.921-3.925l3.921-3.925V13.931z"></path>
                            </svg>
                            <input type="ID"  name="email" class="user-input" placeholder="School ID"> 
                        </div>
                        <div class="password">
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path d="M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878"></path>
                            </svg>
                            <input type="password"  name="password" class="pass-input" placeholder="Password"> 
                        </div>
                    </div>
                    <input  type="submit" name="signedin1" class="signin-button" value="Login">
                    <div class="link">
                        <a href="#">Forgot Password ?</a>
                    </div>
                </div>
            </form>
        </center>  
    </body>
</html>

<?php
$con = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($con, "club");
  

if (isset($_POST['signedin1'])) 
{
    $adminname =  $_POST['email'];
    $apassword = $_POST['password'];

    $query = "SELECT * FROM admin WHERE aEmail = '$adminname' AND aPassword = '$apassword'";
    $data = mysqli_query($con, $query);

    $total = mysqli_num_rows($data);

    if ($total == 1)
    {
        $_SESSION['admin_name'] = $adminname;
        header('location:userrequest.php');
    } 
    else 
    {
        echo '<script>alert("Try Again! you are not Logged In")</script>';
    }
}


?>