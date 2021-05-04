<?php
    $mysqli=new mysqli('localhost','root','Charan@31','municipal_waste_management');
    if ($mysqli->connect_error) {
        die('Connect Error (' . 
        $mysqli->connect_errno . ') '. 
        $mysqli->connect_error);
    }
    $sql="select * from complaints";
    $result=$mysqli->query($sql);
    $mysqli->close();
?>
<!DOCTYPE html>
<head>
    <title>Truck status</title>
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
    </style>
</head>
<body>
    <div>
        <table>
            <tr>
                <th>Truck Number</th>
                <th>Area</th>
                <th>Status</th>
            </tr>
            <?php
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $rows['truck_no']; ?></td>
                <td><?php echo $rows['area']; ?></td>
                <td><?php echo $rows['status']; ?></td>
            </tr>
            <?php
                }
            ?>     
        </table>
        <p>Add truck?</p>
        <button>Add</button>
    </div>
</body>