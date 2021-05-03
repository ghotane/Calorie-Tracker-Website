<?php

session_start();
    include("connections.php");
    include("functions.php");

    if(isset($_POST['item'])){
        $user_id = $_SESSION['user_id'];
        $item = $_POST['item'];
        $cal = $_POST['cal'];
        $query = "insert into foodcalorie (Foodname, Calories) values('$item', '$cal')";
        $query2 = "insert into chartdata (user_id, Foodname, Calories,date) values('$user_id', '$item','$cal',CURRENT_DATE())";
        $query3 = "SELECT Foodname,Calories FROM `chartdata` WHERE user_id = '$user_id' and date = CURRENT_DATE()";
        
        $check = "select * from foodcalorie where Foodname = '$item' ";
        $count = mysqli_num_rows(mysqli_query($con, $check));
        if($count == 0){
            mysqli_query($con, $query);
        }
        mysqli_query($con, $query2);
        $result = $con->query($query3);
        
        $send = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                array_push($send,array($row["Foodname"],$row["Calories"]));
            }
        }
        echo json_encode($send);
        
    }
?>