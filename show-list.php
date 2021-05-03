<?php

session_start();
    include("connections.php");
    include("functions.php");

    if(isset($_POST['query'])){
        $inpText = $_POST['query'];
        $query3 = "SELECT Foodname, Calories FROM foodcalorie WHERE Foodname LIKE '%$inpText%'";

        $result = $con->query($query3);
        $send = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $send[$row['Foodname']] = $row['Calories'];
            }
        }else{
        }
        echo json_encode($send);
    }