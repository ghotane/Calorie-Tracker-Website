<?php

session_start();
    include("connections.php");
    include("functions.php");

    if($_POST['check'] == 200){

        $id = $_SESSION['user_id'];
        $query = "SELECT SUM(Calories) as Total, date(date) as Date, DAY(date) as Day FROM `chartdata` where user_id = '$id' GROUP BY date(date)";

        $result = $con->query($query);
        $send = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $send[$row['Day']] = $row['Total'];
            }
        }else{
        }
        echo json_encode($send);
    }
    else {
        echo "Did not work";
    }