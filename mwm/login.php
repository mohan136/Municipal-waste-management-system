<?php
   $con=mysqli_connect('localhost','root','Rohitha@123','municipal_waste_management');
   if(isset($_POST["user"])){
   $user=$_POST["user"];
   $pass=$_POST["pass"];
   $sql="select * from login_details where username='$user' and password='$pass'";
   $res=mysqli_query($con,$sql);
   $row=mysqli_num_rows($res);
   if($row){
      header("Location:status.html");
   }
   else{
       echo '<script>alert("Invalid username or password");</script>';
   }
   mysqli_free_result($res);
    }
   mysqli_close($con);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    </head>
    <body>
        <div id="login" name="login">
            <div id="loginlayout">
                <form id="form" action="login.php" method="POST" onsubmit="return validateForm();" target="_self">
                    <h1>Login</h1>
                    <input id="username" type="text" placeholder="Username*" name="user">
                    <input id="password" type="password" placeholder="Password*" name="pass">
                    <i class="far fa-eye" id="eye" onclick="togglePassword()"></i>
                    <input type="submit" value="Login">
                    <p onclick="forgotPassword()">Forgot password?</p>
                </form>
            </div>
            <div id="loginmsg">
                <h1>OUR COUNTRY IS OUR IDENTITY,KEEP CLEAN.</h1>
                <p>GO GREEN,SAY <span id="no">NO</span> TO LITTERING.</p>
            </div>
        </div>
        <script src="loginjs.js"></script>
    </body>
</html>