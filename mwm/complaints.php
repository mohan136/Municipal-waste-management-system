<?php
   $con=mysqli_connect('localhost','root','Rohitha@123','municipal_waste_management');
   if(isset($_POST["c_name"])){
   $c_name=$_POST["c_name"];
   $c_aadhaar=$_POST["c_aadhaar"];
   $c_phn=$_POST["c_phn"];
   $area=$_POST["area"];
   $sql="select * from aadhaar_info where name='$c_name' and aadhaar_no='$c_aadhaar' and phn_no='$c_phn'";
   $res=mysqli_query($con,$sql);
   $num=mysqli_num_rows($res);
   if($num){
       $query="select * from complaints where location='$area'";
       $x=mysqli_num_rows(mysqli_query($con,$query));
       if(!$x){
         $sql="insert into complaints values('$c_name','$c_aadhaar','$c_phn','$area')";
         mysqli_query($con,$sql);
       }
         echo '<script>alert("Your request is recorded, we will solve it ASAP");</script>';
   }
   else{
     echo '<script>alert("Please enter valid aadhaar details");</script>';
   }
   mysqli_free_result($res);
   }
   $sql="select street_name from street_info";
   $result1=mysqli_query($con,$sql);
   mysqli_close($con);
?>
<!DOCTYPE html>
<head>
    <title>Complaints</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html,body{
            height:100%;
            margin:0;
            background-image:url("images/pexels-photo.jpg");
        }
        .main{
            width:100%;
            height:100%;
            color: purple;
        }
        form{
            width:fit-content;
            margin-left:550px;
        }
        i{
            color: purple;
        }
        p{
            display:inline;
            font-size:20px;
        }
        select{
            height: 30px;
            width:250px;
            border-radius:5px;
        }
        
        input[type=submit]{
            margin-left:10px;
            margin-top:10px;
            width:100px;
            background-color: purple;;
            color: white;
        }
        .content{
            text-align: left;
            padding:10px;
        }
        input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>
<body>
    <div clsss="main">
        <a href="home.php"><i style="margin-left:40px; font-size:40px;margin-top:50px;"class="fa fa-arrow-circle-left" ></i></a>
        <form action="complaints.php" method="POST" target="_self" onsubmit="return check_details();">
            <div class="content">
            <i class="fa fa-user-circle-o"></i>
            <p>Complainant Name</p><br>
            <input type="text" name="c_name" id="c_name" required>
            </div>
            <br>
            <div class="content">
            <i class="fa fa-address-card"></i>
            <p>Complainant aadhaar</p><br>
            <input type="number" name="c_aadhaar" id="c_aadhaar" required>
            </div>
            <br>
            <div class="content">
            <i class="fa fa-phone-square"></i>
            <p>Complainant phone</p><br>
            <input type="number" name="c_phn" id="c_phn" required>
            </div>
            <br>
            <div class="content">
                <i class="fa fa-map-marker"></i>
                <p>Area</p><br>
                <select name="area" id="area" required>
                    <?php 
                         while($row=mysqli_fetch_assoc($result1)){
                    ?>
                         <option value="<?php echo $row['street_name'] ?>"> <?php echo $row['street_name'] ?> </option>
                    <?php
                         }
                    ?>
                </select>
            </div>
            <div class="content">
                <p>Please enter the details that are linked to given aadhaar num.</p>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
    <script src="loginjs.js"></script>
</body>