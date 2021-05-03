<?php
session_start();
include("connections.php");
include("functions.php");
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    if(!empty($email) && !empty($password))
    {
        //read from database
        $query = "select *from registration where Email = '$email' limit 1";

        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) == 1)
            {
                
                $user_data = mysqli_fetch_assoc($result);
                $hashed_password = $user_data['password'];
                if(password_verify($password, $hashed_password))
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    $_SESSION['user_name'] = $user_data['Fname'];
                    header("Location: index.php");
                    die;
                    //echo "THis is the index page";
                } else{
                    echo '<script>alert("Please enter valid information")</script>';
                }
            }
        }

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
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <style type="text/css">
    body{
        content: '';
	    position:absolute;
        top: 0px;
        bottom: 0px;
        left: 0px;
        right: 0px;
        /* background-image: linear-gradient(to right, #a8c66c, #a8c66c); */
        background: url(fruit1.jpg);
        
        background-position: top center;
	    background-size: cover;
        opacity: 0.9;
        margin-top: 150px;
        
    }

    .login-left{
        text-align: center;
        color: white;
        padding: 30px;
    }

    .login-right{
        position: relative;
        border: none;
        
        /* background: #e1dd72; */
        background: #f5f5dc;
        
        border-top-right-radius: 15% 30%;
        border-bottom-left-radius: 15% 30%;
        padding: 50px;
        
    }

    .login-right h2{
        position: relative;
        text-align: center;
        margin-bottom: 10px;
        color: #800000;
    }

    .login-form{
        padding: 35px;
    }

    .login-right .btn-primary{
        border-radius: 1.5rem;
        border: none;
        width: 120px;
        background: #ff9800;
        font-weight: 600;
        color: #fff;
        margin-top: 20px;
        padding: 10px;
    }

    .login-right .btn-primary:hover{
        background: #ff5722;
    }

    .register p{
        text-align: justify;
        font-size: 1.5rem;
        color:white;
    }

    .register a{
        text-align: justify;
        font-size: 1.5rem;
        margin-bottom: 10px;
        padding: 20px 20px 0;
    }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-10 offset = md-1">
                <div class="row">
                    <div class="col-md-5 login-left">
                    </div>
                    <div class="col-md-7 login-right">
                        <h2>Account Login</h2>
                        <form action="login.php" method="post">
                            <div class="login-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" name = "email" id="emVal" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name = "password" id="passVal" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary">SIGN IN</button>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-9 register">
                                        <p style="color:blue">Dont have an account?</p>
                                    </div>
                                    <div class="col-md-3 register">
                                        <a href="register.php">Register</a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
  </body>
</html>