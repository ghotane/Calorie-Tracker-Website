<?php
    session_start();
    include("connections.php");
    include("functions.php");

    $user_data = check_login($con);
    $id = $_SESSION['user_id'];

    $query = "SELECT Foodname,Calories FROM `chartdata` WHERE user_id = '$id' and date = CURRENT_DATE()";
    $result = $con->query($query);
    
?>


<html lang="en">
<head>
  <script>
    var x_axis = new Array();
    var y_axis = new Array();
    var chart = '';
    var total = 0;
    var foodname = [];
    var calories = [];
    var state = 0;
  </script>
  
  <script>
    function loadDoc(x){
      var http = new XMLHttpRequest();
      http.onreadystatechange = function(){
        if(this.readyState==4 && this.status == 200){
          // do something
          var data = JSON.parse(this.responseText);
          for(var key in Object.keys(data)){
            foodname.push(data[key][0]);
            calories.push(parseInt(data[key][1]));
          }
          total = calories.reduce((a, b) => a + b, 0);
        }
      };
      http.open("POST",x,false);
      http.send();
    }
    loadDoc("getData.php");
    function listify(){
      var ret ="";
      for(var i =0; i < foodname.length;i++){
        ret += '<li class="collection-item"><strong>'+ foodname[i] +  '</strong> <em>'+calories[i] +' Calories</em> </li> \n';
      }
      document.getElementById("item_list").innerHTML = ret
    }
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->

  <!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Meal & Calorie Tracker</title>
</head>
<body>

  <!-- <canvas id="myChart"></canvas>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> -->
  
  <!-- Navbar -->
  <nav>
    <div class="nav-wrapper black">
      <div class="container">
        <a href="#" class="brand-logo left">Calorie Tracker</a>
        <ul class="right">
          <li><a href="calculate.php" class = "nav-link">Calorie Calculator</a></li>
          <li><a href="logout.php" class = "nav-link">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <br>

  <?php
    echo "<p style='text-align: center; font-weight: 600; font-size: 30px; color:#800000;'> Welcome ". $_SESSION['user_name'] . "</p>";
  ?>

  <div class="container">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Add Meal / Food Item</span>
          <div class="row">
            <div class="input-field col s6">
              <input type="text" name="AddItem" placeholder="Add Item" id="item-name">
              <label for="item-name">Meal</label>
            </div>
            <div class="input-field col s6">
                <input type="number" name="itemCalories" placeholder="Add Calories" id="item-calories">
                <label for="item-calories">Calories</label>
            </div>
            <div class = "list-group" id = "show-list" style="position:relative; color:red;margin-left:10px;">

            </div>
            <button type="submit" id = "add" class="add-btn btn orange darken-3"><i class="fa fa-plus"></i> Add Meal</button>         
          </div>
          <!-- <div class="col-md-5" style="position:relative; margin-top:-38px; margin-left:10px;">
              <div class="list-group" id="show-list">
                
              </div>
          </div> -->
      </div>
    </div>
    
    <!-- Calorie Count -->
    <h3 class="center-align col-md-10" id="total" style="display:inline-block; text-align:center;">Total Calories: <span id = "totalSpan" class="total-calories">0</span></h3>
    <button type="submit" id= "detail" class="add-btn btn green darken-3 col-md-2" style="float:right;"><i class="fa fa-plus"></i> Details</button>  
    


    <!-- Showing the list and the graph on the same container/div and make them toggle with the details button -->

    <div style="position:relative; width: 100%; height:400px">
      <div style="position:absolute; width:100%">
        <ul id="item_list" class="collection">

        </ul>
      </div>
  
      <div style="position:absolute; width: 100%;">
        <canvas id="myChart" style="visibility:hidden;"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script type="text/javascript">
          var ctx = document.getElementById('myChart').getContext('2d');
          var chart = new Chart(ctx, {
      // The type of chart we want to create
          type: 'bar',

      // The data for our dataset
          data: {
            labels: x_axis,
            datasets: [{
              label: 'Line chart showing the amount of calories intake per day',
              //backgroundColor: 'rgb(255, 99, 132)',
              backgroundColor: 'rgba(24, 0, 2, 0.82)',
              borderColor: 'rgb(255, 99, 132)',
              data: y_axis,
              
            }]
          },

      // Configuration options go here
          options: {
            responsive: true,
            scales: {
              xAxes: [{
                display: true,
                scaleLabel:{
                  display: true,
                  labelString: 'Days'
                },
              }],

              yAxes: [{
                display:true,
                ticks: {
                  min: 1000,
                  
                  
                },
                scaleLabel:{
                  display:true,
                  labelString: 'Calories'
                }
              }]
            }

          }
          });</script>
        </div>

    </div>
    
  
  <script type="text/javascript">
  var js = {};
  var graph = {};
  function disList(x){
    var ret = '';
    for (var key of Object.keys(x)){
      ret = ret + "<a href='#' class='list-group-item list-group-item-action border-1'>"+key+"</a><br>"
    }
    return ret;
  }
    $(document).ready(function(){

      listify();
      $("#item-name").keyup(function(){
        var searchText = $(this).val();
        if(searchText != ''){
          $.ajax({
            url:'show-list.php',
            method: 'post',
            data: {query:searchText},
            success:function(response){
              js = $.parseJSON(response);
              $("#show-list").html(disList(js));
            }
          });
        }
        else{
          $("#show-list").html('');
        }
      });
      

      //Add meal
      $('#add').on('click',function(){
        var item = document.getElementById("item-name").value;
        var cal = document.getElementById("item-calories").valueAsNumber;
        var data = '';
        if(item !=''){
          $.ajax({
            url: 'addToDatabase.php',
            method: 'post',
            data: {item:item, cal:cal},
            success:function(response){
              data = $.parseJSON(response);
              foodname.length = 0;
              calories.length = 0;
              for(var key in Object.keys(data)){
                foodname.push(data[key][0]);
                calories.push(parseInt(data[key][1]));
              }
              total = calories.reduce((a, b) => a + b, 0);
              document.getElementById("totalSpan").innerHTML = total;
              listify()
              chart.update();
            }
          })
          
        }
        document.getElementById("item-name").value = "";
        //document.getElementById("item-serving").value = "";
        document.getElementById("item-calories").value = "";
        
        
      });

      // added code for graph
      $('#detail').on('click', function(){
        if(state == 0){
          document.getElementById("myChart").style.visibility = 'visible';
          document.getElementById("item_list").style.visibility = 'hidden';
          state = 1;
        } else {
          document.getElementById("item_list").style.visibility = 'visible';
          document.getElementById("myChart").style.visibility = 'hidden';
          state = 0;
        }
        
        var ok = 200;
        $.ajax({
          url:'graphData.php',
          method: 'post',
          data:{check:ok},
          success:function(response){

            var today = new Date();
            graph = $.parseJSON(response);
            x_axis.length = 0;
            y_axis.length = 0;
            for (var key of Object.keys(graph)){
              var date = new Date(key);
              x_axis.push(key)
              y_axis.push(graph[key])
              
            }
            chart.update();
          }
        })
      });
      //end for graph
      $(document).on('click','a', function(){
        var x = $(this).text();
        $("#item-name").val(x);
        $("#show-list").html('');
        
       // document.getElementById('#item-calories').val("45");
        $("#item-calories").val(js[x]);
      });
    });
    document.getElementById("totalSpan").innerHTML = total;
  </script>


  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>    
  <!-- <script src="in.js"></script> -->
</body>
</html>
