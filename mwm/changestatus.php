<?php
    $mysqli=new mysqli('localhost','root','','municipal_waste_management');
    if ($mysqli->connect_error) {
        die('Connect Error (' . 
        $mysqli->connect_errno . ') '. 
        $mysqli->connect_error);
    }
    if(array_key_exists("assign",$_POST)){
        $sql="update street_info set status='Running' where next_date=current_date";
        $result=$mysqli->query($sql);
        header('Location: status.html');
    }
    if(array_key_exists("complaintassign",$_POST)){
        $sql="update street_info set number_of_complaints=number_of_complaints+1 where street_name in (select location from complaints)";
        $res=$mysqli->query($sql);
        $sql="update complaints set status='Running'";
        $result=$mysqli->query($sql);
        header('Location: status.html');
    }
?>