<?php

session_start();
    include("connections.php");
    include("functions.php");


    $id = $_SESSION['user_id'];
    $query = "SELECT Foodname,Calories FROM `chartdata` WHERE user_id = '$id' and date = CURRENT_DATE()";

    $result = $con->query($query);
    $send = array();
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            array_push($send,array($row["Foodname"],$row["Calories"]));
        }
    }
    echo json_encode($send,JSON_FORCE_OBJECT);
    
?>