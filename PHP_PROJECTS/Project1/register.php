<?php

if(isset($_POST["register_btn"]))
{
    include("dbconnect.php");
    $fn = $_POST["fullname"];
    $eid = $_POST["email"];
    $pwd = md5($_POST["password"]);
    $mb = $_POST["mobile"];


    $qry = "INSERT INTO `registerdata`(`id`, `fullname`, `email`, `password`, `mobile`) VALUES ('NULL','$fn','$eid','$pwd','$mb')";

    $result = mysqli_query($connect,$qry);
    if($result)
    {
        echo "registration success";
    }
    else
    {
        echo "something went wrong";
    }

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>register page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
                <dic class="card">
                    <div class="card-header bg-success text-light">
                        <b>Registration</b>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Fullname</label>
                                <input type="text" name="fullname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="tel" name="mobile" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" name="register_btn">Register</button>
                            </div>
                            <p>Already have an Account?<a href="login.php"> Sign In </a></p>
                                

                            

                        </form>
                    </div>
                </dic>

            </div>
        </div>
    </div>
    
</body>
</html>