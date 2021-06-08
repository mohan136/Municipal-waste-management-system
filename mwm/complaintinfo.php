<?php
    $mysqli=new mysqli('localhost','root','','municipal_waste_management');
    if ($mysqli->connect_error) {
        die('Connect Error (' . 
        $mysqli->connect_errno . ') '. 
        $mysqli->connect_error);
    }
    $sql="delete from complaints where date=date_add(current_date,interval -1 day)";
    $res=$mysqli->query($sql);
    $sql="select location,status from complaints where date=current_date";
    $result=$mysqli->query($sql);
    $sql="select status from complaints where date=current_date limit 1";
    $status=$mysqli->query($sql);
    $mysqli->close();
?>
<!DOCTYPE html>
<head>
    <title>Streets Information</title>
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
                if($result->num_rows)
                {
                    while($rows=$result->fetch_assoc())
                    {
            ?>
                <tr>
                    <td><?php echo $rows['location']; ?></td>
                    <td><?php echo $rows['status']; ?></td>
            </tr>
            <?php
                }
            ?>     
        </table>
        <?php
            $srow=$status->fetch_assoc();
            if($srow['status']=='Not Running'){
        ?>
        <form id="assign" action="changestatus.php" method="post" target="_self">
           <p>Assign truck?</p>
           <input type="submit" name="complaintassign" value="Assign">
        </form>
        <?php
            }
            else if($srow['status']=='Running'){
        ?>
        <form id="deassign" action="changedate.php" method="post" target="_self">
           <p>Deassign truck?</p>
           <input type="submit" name="complaintdeassign" value="Deassign">
        </form>
        <?php
            }
            }
        ?>
        </table>
    </div>
</body>