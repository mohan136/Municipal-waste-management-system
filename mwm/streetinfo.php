<?php
    $mysqli=new mysqli('localhost','root','Rohitha@123','municipal_waste_management');
    if ($mysqli->connect_error) {
        die('Connect Error (' . 
        $mysqli->connect_errno . ') '. 
        $mysqli->connect_error);
    }
    $sql="select * from street_info";
    $result=$mysqli->query($sql);
    $mysqli->close();
?>
<!DOCTYPE html>
<head>
    <title>Streets Information</title>
    <style>
        body{
            height:100%;
            margin:0;
            background-image: url("images/google-map-background.png");
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
    </style>
</head>
<body>
    <div>
        <table>
            <tr>
                <th>Street name</th>
                <th>Next cleaning date</th>
                <th>Delay</th>
                <th>Complaints this week</th>
            </tr>
            <?php
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $rows['street_name']; ?></td>
                <td><?php echo $rows['next_date']; ?></td>
                <td><?php echo $rows['delay']; ?></td>
                <td><?php echo $rows['number_of_complaints']; ?></td>
            </tr>
            <?php
                }
            ?>     
        </table>
    </div>
</body>