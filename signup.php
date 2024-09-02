<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require 'base/connection.php';


    $userfname = $_POST["userfname"];
    $userlname = $_POST["userlname"];
    $usergender = $_POST["usergender"];
    $useremail = $_POST["useremail"];
    $password = $_POST["userpass"];
    $confirmpassword = $_POST["usercpass"];
    $uphone = $_POST["uphone"];




    $sqlemail = "select * from info where Email='$useremail'";

    $result = mysqli_query($connection, $sqlemail);

    $row = mysqli_num_rows($result); //1


    if ($row > 0) {
        echo "useremail already exist";
    } else {

        if ($password == $confirmpassword) {

            $hashpass= password_hash($password,PASSWORD_DEFAULT);

            $sqlinsert = "INSERT INTO `info`(`Firstname`, `Lastname`, `Gender`, `Email`, `Password`, `Phone`) VALUES ('$userfname','$userlname ', '$usergender', '$useremail','$hashpass','$uphone')";

            $resultins = mysqli_query($connection, $sqlinsert);
            if ($resultins) {
                echo "inserted";
            }
        } else {
            echo "password doesnot match";
        }
    }
}


?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .form-bg {
    min-height: 100vh; 
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 200px;

}

        .form-container{
    font-family: 'Nunito', sans-serif;
    font-size: 0;
    border-radius: 20px;
    overflow: hidden;
    max-width: 100%; 
    
}
.form-container .form-img{
    background-image: url('https://images.unsplash.com/photo-1509319117193-57bab727e09d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
    background-repeat: no-repeat;
    background-position: center center;
    width: 50%;
    height: 587px;
    vertical-align: top;
    display: inline-block;
}
.form-container .form-horizontal{
    background: #000;
    width: 50%;
    padding: 33px 35px 32.5px;
    display: inline-block;
}
.form-container .title{
    color:#fff;
    font-size: 25px;
    font-weight: 400;
    margin: 0 0 35px;
}
.form-container .form-horizontal .form-group{ margin: 0 0 10px; }
.form-container .form-horizontal .form-control{
    color: #ccc;
    background: transparent;
    padding: 5px 0;
    margin-bottom: 33px;
    border: none;
    border-bottom: 1px solid rgba(255,255,255,.2);
    border-radius: 0;
}
.form-container .form-horizontal .form-control:focus{
    outline: none;
    box-shadow: none;
}
.form-container .form-horizontal .form-control::placeholder{
    color: #ccc;
    font-size: 16px;
    font-weight: 400;
}
.form-container .form-horizontal .form-group select.form-control option{
    color: #000;
    background: #fff;
}
.form-container .form-horizontal .btn{
    color:#fff;
    background:#4dae3c;
    font-size: 18px;
    letter-spacing: 1px;
    border-radius: 50px;
    padding: 8px 25px;
    border: none;
    transition: all .4s ease;
}
.form-container .form-horizontal .btn:hover{ text-shadow: 2px 2px 2px rgba(0,0,0,.6); }
.form-container .form-horizontal .btn:focus{ outline: none; }
@media only screen and (max-width:576px){
    .form-container .form-img{
        width: 100%;
        height: 400px;
    }
    .form-container .form-horizontal{ width: 100%; }
}
.form-container .form-horizontal .form-group {
    margin: 0 0 8px; 
}

.form-container .form-horizontal .form-control {
    margin-bottom: 24px; 
}

    </style>
</head>

<body>
    
<div class="form-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="form-container">
                    <div class="form-img"></div>
                    <form class="form-horizontal"  action="signup.php" method="post">
                        <h3 class="title">Registration Info</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" name="userfname" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="userlname" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="usergender" >
                                <option value="none" selected="">Gender</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                                <option value="other">other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="useremail" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="userpass" placeholder="Password">
                        </div>
                        <div class="form-group">
                                    <input type="password" name="usercpass" class="form-control" placeholder="Confirm Password">
                                </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="uphone" placeholder="Phone">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                        
                    </form>
                
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>