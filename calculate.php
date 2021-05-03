<?php
session_start();
include("connections.php");
include("functions.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <title>Calorie Calculator</title>
</head>

<body>

    <style type="text/css">
        body {
            content:'';
            position: absolute;
            top: 0px;
            bottom: 0px;
            left: 0px;
            right: 0px;
            background-image: url(fruit1.jpg);
            margin-top: 10px;
            margin-bottom: 50px;
            margin-left: 200px;
            background-position: top center;
            background-size: cover;
            opacity: 0.9;
        }

        .register-right {
            border: none;
            background: #f5f5dc;
            padding: 50px;
        }

        .register-right h2 {
            text-align: center;
            margin-bottom: 10px;
            color: #555;
        }

        .register-right .btn-primary {

            border-radius: 1.5rem;
            border: none;
            width: 120px;
            background: #ff9800;
            font-weight: 600;
            color: #fff;
            margin-top: 20px;
            padding: 10px;
        }

        .register-right .btn-primary:hover {
            background: #ff5722;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12 offset = md-1">
                <div class="row">
                    <div class="col-md-10 register-right">
                        <h2>Calorie Calculator</h2>
                        <form id="calorie-form">
                            <div class="form-group row">
                                <label for="age" class="col-sm-2 col-form-label">Age</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="age" placeholder="Age in years"
                                        required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <legend class="col-form-label col-sm-2 pt-O">Gender</legend>
                                <select name="gender_option" id="gender" required>
                                    <option value="gender" selected disabled>Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label for="weight" class="col-sm-2 col-form-label">Weight</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="weight" placeholder="Weight in Lbs">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="height" class="col-sm-2 col-form-label">Height</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="height"
                                        placeholder="Height in inches">
                                </div>
                            </div>
                            <div class="form-group row">
                                <legend class="col-form-label col-sm-3 pt-O">How active are you?</legend>

                                <select class="custom-select col-sm-9" id="activity" required>
                                    <option value="activity" selected disabled>Select one</option>
                                    <option value="sedentary">Little or no exercise</option>
                                    <option value="light">Light exercise/sports 1-3 days/week</option>
                                    <option value="moderate">Moderate exercise/sports 3-5 days/week</option>
                                    <option value="hard">Hard exercise/sports 3-5 days/week</option>
                                    <option value="extra_hard">Very hard exercise/sports 3-5 days/week</option>
                                </select>

                            </div>

                            <div class="form-group">
                                <input type="submit" value="calculate" class="btn btn-primary">
                            </div>

                            <div class="form-group row" id="results" class="pt-4">
                                <label for="max" class="col-sm-6 col-form-label"
                                    style="font-size:25px; font-weight: bold">Your Daily
                                    Calories</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" id="total-calories" disabled>
                                </div>
                            </div>

                            <div class="form-group row" id="results" class="pt-4">
                                <label for="low" class="col-sm-6 col-form-label"
                                    style="font-size:25px; font-weight: bold">Lowest calorie Intake in a day</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" id="lowestCalories" disabled>
                                </div>
                            </div>
                            

                        </form>
                        <div>
                            <button class="btn btn-primary"><a href="index.php">Back</a></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>

</html>