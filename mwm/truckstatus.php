<?php
    $mysqli=new mysqli('localhost','root','Rohitha@123','municipal_waste_management');
    if ($mysqli->connect_error) {
        die('Connect Error (' . 
        $mysqli->connect_errno . ') '. 
        $mysqli->connect_error);
    }
    $sql="select street_name from street_info where next_date = current_date";
    $result1=$mysqli->query($sql);
    $sql="select street_name from street_info where next_date = date_add(current_date ,interval 7 day)";
    $result2 = $mysqli->query($sql);
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
        #deassign{
            display:none;
        }
    </style>
</head>
<body>
    <div>
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
                    <td class="status">Not Running</td>
            </tr>
            <?php
                }
            ?>     
        </table>
        <div id="assign">
            <p>Assign truck?</p>
            <button onclick="assign()">Assign</button>
        </div>
        <form id="deassign" action="changedate.php" method="post" target="_self">
           <p>Deassign truck?</p>
           <input type="submit" name="deassign" value="Deassign" onclick="deassign()">
        </form>
        <?php
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
    <script>
        function assign(){
            document.getElementById("assign").style="display:none";
            document.getElementById("deassign").style="display:block";
            var st=document.getElementsByClassName("status");
            for(var i=0; i<st.length; i++)
            {
                st[i].innerHTML= "Running";
            }
        }
    </script>
</body>