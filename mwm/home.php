<?php
    $mysqli=new mysqli('localhost','root','','municipal_waste_management');
    if ($mysqli->connect_error) {
        die('Connect Error (' . 
        $mysqli->connect_errno . ') '. 
        $mysqli->connect_error);
    }
    if(isset($_POST["location"])){
    $loc=$_POST['location'];
    $sql="select * from street_info where street_name='$loc'";
    $result=$mysqli->query($sql);
    $rows=$result->fetch_assoc();
    }
    $sql="select street_name from street_info";
   $result1=$mysqli->query($sql);
    $mysqli->close();
?>
<!DOCTYPE html>
<head>
    <title>GVMC</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="homestyle.css?v=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div>
            <img id="logo" src="./images/logo.png" height="80" width="80">
        </div>
        <nav>
            <ul>
                
                <li> <a href="login.php">Login</a></li>
                <li> <a href="complaints.php">complaint </a></li>
                <li> <a href="request.php">Request </a></li>
                <li> <a href="#aboutus">About us </a></li>
            </ul>
        </nav>
    </header>
    <div class="main">
        <h1 class="main-head">Greater Visakhapatnam Municipal Corporation</h1>
        <p class="main-content">In a bid to improve its solid waste management efficiency, the Greater Visakhapatnam Municipal Corporation has been running a pilot project in ward 10 of the city for some time now. The civic body has tied up with Andhra Pradesh Urban Infrastructure Asset Management Limited (APUIAML) for the project.
          The project envisages complete mechanisation of waste collection, GPS tracking of vehicles and route mapping, 100% door-to-door collection, allocating a certain stretch to sanitary workers with special attention towards street sweeping and drain clearance etc. Prior to the launch of the project, the GVMC conducted a gap analysis in five wards of the city in the first half of this year to ascertain the critical gaps in solid waste management services and infrastructure requirements. </p>
    </div >
    <div id="showinfo">
        <h1>You can check next cleaing date for your area here.</h1>
        <form action="home.php" method="POST">
        <select style="font-size:20px;" name="location" id="area" required>
                    <?php 
                         while($row=mysqli_fetch_assoc($result1)){
                    ?>
                         <option value="<?php echo $row['street_name'] ?>"> <?php echo $row['street_name'] ?> </option>
                    <?php
                         }
                    ?>
                </select>
            <input type="submit" value="Go">
                <div id="date">
                    <?php
                       if(isset($_POST['location']))
                       {
                    ?>
                    <p><?php echo $_POST['location'] ?></p>
                    <p><?php echo $rows['next_date'] ?></p>
                    <?php } ?>
                </div>
        </form>
    </div>
    <div class="slideshow-container">

        <div class="mySlides fade">
          <img src="./images/truck gvmc-1.jpg" style="width:100%">
        </div>
        
        <div class="mySlides fade">
          <img src="./images/Detail-Dumpsters-DimitriMa-Shutterstock.jpg" style="width:100%">
        </div>
        
        <div class="mySlides fade">
          <img src="./images/truck-2.jfif" style="width:100%">
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br> 
    <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
    </div>
    <div class="main" id="aboutus">
        <h1 class="main-head">About Us</h1>
        <p class="main-content">The Greater Visakhapatnam Municipal Corporation (GVMC) is the civic body that governs the city of Visakhapatnam the executive capital and largest city of the Indian state of Andhra Pradesh. Its jurisdiction encompasses an area of 681.96 km2 (263.31 sq mi). It is also part of the planning body of the Visakhapatnam Metropolitan Region Development Authority. Established in the year 1979, the executive power of the GVMC is vested in the Municipal Commissioner, an Indian Administrative Service (IAS) officer appointed by the Government of Andhra Pradesh. The position is held by G. Srijana, IAS. Golagani Hari Venkata Kumari (YSRCP) was elected as the Mayor and Jiyyani Sridhar (YSRCP) as the Deputy Mayor by the newly elected general body in March 2021. In January 2021, the number of wards were increased to 98 from 81 earlier.</p>
    </div>
    <footer>
        <div id="footer-left">
            <img class="logo-footer" src="./images/logo.png" alt="logo-footer" data-at2x="assets/img/logo.png" width="74" height="85">
            <p>
                Together we can achieve save, green and environment friendly society
            </p>
        </div>
        <div id="footer-right">
            <h3>Contact</h3>
            <p><i class="fa fa-map-marker"></i>Visakhapatnam Andhra Pradesh India 531162</p>
            <p><i class="fa fa-phone"></i>Phone: +91 99999 99999</p>
            <p><i class="fa fa-envelope"></i>Email:<a href="gvmc.ap.gv.in">gvmc@ap.gov.in</a></p>
        </div>
    </footer>
    <script src="mainjs.js"></script>
</body>