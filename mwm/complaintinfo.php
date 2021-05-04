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
    <title>Streets Information</title>
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
                <th>Name</th>
                <th>Aadhaar number</th>
                <th>Contact</th>
                <th>Area</th>
            </tr>
            <?php
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $rows['complainant_name']; ?></td>
                <td><?php echo $rows['aadhaar_no']; ?></td>
                <td><?php echo $rows['phn_no']; ?></td>
                <td><?php echo $rows['location']; ?></td>
            </tr>
            <?php
                }
            ?>     
        </table>
        <p>Assign a vehicle?</p>
        <button >Assign</button>
    </div>
</body>