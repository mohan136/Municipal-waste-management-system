<?php
    $mysqli=new mysqli('localhost','root','','municipal_waste_management');
    if ($mysqli->connect_error) {
        die('Connect Error (' . 
        $mysqli->connect_errno . ') '. 
        $mysqli->connect_error);
    }
    if(array_key_exists("deassign",$_POST)){
        $sql="update street_info set status='Not Running' where next_date=current_date";
        $result=$mysqli->query($sql);
        $sql="update street_info set delay=delay/2 where next_date=current_date and number_of_complaints>=3";
        $result=$mysqli->query($sql);
        $sql="update street_info set number_of_complaints=0 where next_date=current_date";
        $result=$mysqli->query($sql);
        $sql="update street_info set next_date=date_add(current_date, interval 7 day) where next_date=current_date and delay=7";
        $result=$mysqli->query($sql);
        $sql="update street_info set next_date=date_add(current_date, interval 4 day) where next_date=current_date and delay=4";
        $result=$mysqli->query($sql);
        $sql="update street_info set next_date=date_add(current_date, interval 2 day) where next_date=current_date and delay=2";
        $result=$mysqli->query($sql);
        header('Location: status.html');
    }
    if(array_key_exists("complaintdeassign",$_POST)){
        $sql="update complaints set date=date_add(current_date,interval 1 day) where status='Not Running'";
        $res=$mysqli->query($sql);
        $sql="update complaints set status='Completed' where status='Running'";
        $res=$mysqli->query($sql);
        header('Location: status.html');
    }
?>