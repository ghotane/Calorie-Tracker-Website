<?php
session_start();
    include("connections.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $gender_option = $_POST['gender_option'];
        $age = $_POST['age'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $active_option = $_POST['active_option'];

        if(!empty($fname) && !empty($lname) && !empty($email) && !empty($hashed_password) && !empty($gender_option) && !empty($age) && !empty($height) && !empty($weight) && !empty($active_option))
        {
            //save to database
            $query = "insert into registration (Fname, Lname, Email, password, Gender, Age, Height, Weight, Active) values('$fname', '$lname', '$email', '$hashed_password', '$gender_option', '$age', '$height', '$weight', '$active_option')";
            
            mysqli_query($con, $query);

        }else{
            echo "Please enter valid informations!";
        }
       

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>


    <style type="text/css">
    
    body{
    content: '';
	position: absolute;
    top: 0px;
    bottom: 0px;
    left: 0px;
    right: 0px;
	background-image: url(fruit1.jpg);
	background-position: top center;
	background-size: cover;
    opacity: 0.8;
    }

    .register-left{
        text-align: center;
        color: #fff;
        padding: 30px;
    }

    .register-left p{
        padding: 20px 20px 0;
    }

    .register-left .btn-primary{
        position: relative;
        border-radius: 1.5rem;
        border: none;
        width: 120px;
        background: #a2a8b9;
        font-weight: 600;
        color: rgb(37, 30, 30);
        margin-top: 20px;
        padding: 10px;
    }

    .register-left .btn-primary:hover{
        background: rgb(52, 175, 165);
    }

    .register-right{
        content:'';
        position: relative;
        align-items: center;
        background: #f5f5dc;
        justify-content: center;
        border: none;
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
        margin-top:120px;
        padding:40px;
        
    }
    .register-right .register{
        padding: 20px;
        font-size: 30px;
        /* color:#FFFAFA; */
        color: #4189e1;
    }

    .register-right h2{
        text-align: center;
        font-weight: bold;
        margin-bottom: 10px;
        color: #800000;
    }

    .register-form{
        padding: 35px;
    }

    .register-right .btn-primary{
        
        border-radius: 1.5rem;
        border: none;
        width: 120px;
        background: #ff9800;
        font-weight: 600;
        color: #fff;
        margin-top: 20px;
        padding: 10px;
    }

    .register-right .btn-primary:hover{
        background: #ff5722;
    }
    .form-group #gender{
        display: block;
        box-sizing: border-box;
        width: 100%;
        outline: none;
        padding: 5px;
        border-width: 2px;
        border-style: solid;
        border-radius: 0;
        color: black;
        
    }

    #activity{
        display: block;
        box-sizing: border-box;
        width: 100%;
        outline: none;
        padding: 5px;
        border-width: 2px;
        border-style: solid;
        border-radius: 0;
        color: black;
        
    }
    
    </style>


    <div class="container">
        <div class="row">
            <div class="col-md-12 offset = md-1">
                <div class="row">
                    <div class="col-md-2 register-left">
                        <!-- <button type="button" class="btn btn-primary">About Us</button> -->
                    </div>
                    <div class="col-md-10 register-right">
                        <h2>Register Here</h2>

                        <div class="register-form">
                            <form action="register.php" method="post">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="confirmpass"
                                        placeholder="Confirm Password">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <select name="gender_option" id="gender" required>
                                            <option value="gender" selected disabled>Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="age" placeholder="Age" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="height"
                                            placeholder="Height in inches" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control" name="weight"
                                            placeholder="Weight in lbs" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="activity">How active are you?</label> -->
                                    <select name="active_option" id="activity" required>
                                        <option value="activity" selected disabled>How active are you?</option>
                                        <option value="sedentary">Little or no exercise</option>
                                        <option value="light">Light exercise/sports 1-3 days/week</option>
                                        <option value="moderate">Moderate exercise/sports 3-5 days/week</option>
                                        <option value="hard">Hard exercise/sports 3-5 days/week</option>
                                        <option value="extra_hard">Very hard exercise/sports 3-5 days/week</option>
                                    </select>

                                </div>
                                <button type="submit" class="btn btn-primary">Register</button>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-9 register">
                                            <p>Already have an account?</p>
                                        </div>
                                        <div class="col-md-3 register">
                                            <a href="login.php">Login</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    
</body>
</html>