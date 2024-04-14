<?php
session_start();
if (isset($_SESSION["uid"]))
{
    header("location:user.php");

}



if (isset($_POST["login_btn"])) {
    include ("dbconnect.php");
    $eid = $_POST["email"];
    $pwd = $_POST["password"];

    if ($eid == "admin" && $pwd == "admin") {
        header("location:admin.php");
    }

    $pwds = md5($pwd);
    $qry = "SELECT * FROM registerdata WHERE email = '$eid' AND password = '$pwds'";
    $result = mysqli_query($connect, $qry);
    $rows = mysqli_num_rows($result);
    $data = mysqli_fetch_assoc($result);
    if ($rows > 0) {
        $id = $data["id"];
        session_start();
        $_SESSION["uid"]=$data["id"];
        header("location:user.php");
    } else {
        ?> <script> alert("Invalid Email OR Password"); </script> <?php
    }


}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
                <div class="card">
                    <div class="card-header bg-success text-light">
                        <b>Login Here</b>
                    </div>
                    <div class="card-body">
                        <form method="post">

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="login_btn">Login</button>
                            </div>
                            <p>Don't hane an Account?<a href="register.php"> Sign Up</a></p>

                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>

</html>