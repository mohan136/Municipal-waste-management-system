<?php
    $mysqli=new mysqli('localhost','root','','municipal_waste_management');
    if ($mysqli->connect_error) {
        die('Connect Error (' . 
        $mysqli->connect_errno . ') '. 
        $mysqli->connect_error);
    }
    $sql="select street_name,status from street_info where next_date = current_date";
    $result1=$mysqli->query($sql);
    $sql="select status from street_info where next_date=current_date limit 1";
    $status1=$mysqli->query($sql);
    $sql="select street_name from street_info where next_date = date_add(current_date ,interval 7 day)";
    $result2 = $mysqli->query($sql);
    $mysqli->close();
?>
<!DOCTYPE html>
<head>
    <title>Truck status</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            height:100%;
            margin:0;
            background-image: url("images/complaint-background.png");
            text-align:center;
        }
        table{
            border:1px solid black;
            margin:auto;
            margin-top:100px;
            border-radius:3px;
            font-size:20px;
        }
        th,td{
            background-color:transparent;
            padding:15px;
            border:1px solid black;
            font-weight:bold;
            text-align:center;
        }
        td{
            font-weight:lighter;
        }
        p{
            font-size:20px;
            font-family:Helvetica;
            display:inline;
        }
        button{
            text-align:center;
            width:70px;
            height:20px;
        }
        i{
            float:right;
            font-size:30px;
            margin-right:50px;
        }
    </style>
</head>
<body>
    <div>
    <a href="home.php"><i class="fa fa-sign-out">Logout</i></a>
        <table>
            <tr>
                <th>Area</th>
                <th>Status</th>
            </tr>
            <?php
                if($result1->num_rows)
                {
                    while($rows=$result1->fetch_assoc())
                    {
            ?>
                <tr>
                    <td><?php echo $rows['street_name']; ?></td>
                    <td><?php echo $rows['status']; ?></td>
            </tr>
            <?php
                }
            ?>     
        </table>
        <?php
            $srow=$status1->fetch_assoc();
            if($srow['status']=='Not Running'){
        ?>
        <form id="assign" action="changestatus.php" method="post" target="_self">
           <p>Assign truck?</p>
           <input type="submit" name="assign" value="Assign">
        </form>
        <?php
            }
            else{
        ?>
        <form id="deassign" action="changedate.php" method="post" target="_self">
           <p>Deassign truck?</p>
           <input type="submit" name="deassign" value="Deassign">
        </form>
        <?php
            }
            }
            else
            {
                while($rows=$result2->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $rows['street_name']; ?></td>
                <td >Completed</td>
            </tr>
            <?php
                }
            ?> 
            </table>
            <?php
                }
            ?>
    </div>
</body>