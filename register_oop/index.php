<?php
 session_start();
 include_once('functions.php');
 $userdata = new DB_con();

 if(isset($_POST['login'])){
    $uname = $_POST['username'] ;
    $password = md5($_POST['password']);

    $result = $userdata->signin($uname,$password );
    $num = mysqli_fetch_array($result);

    if($num > 0 ){
        $_SESSION['id'] = $num['id'];
        $_SESSION['fullname'] = $num['fullname'];

        echo"<script>alert('Login Successfull!!');</script>";
        echo "<script>window.location.href='welcome.php'</script>";
    }else{
        echo"<script>alert('Something  went wrong! Please typ');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
            
        <div class="container  ">
            <h1 class="m-5">Login Page</h1>
            <hr>
            <form method="post">          
            <div class="form-group  " >
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" style="width: 500px;" id="username" name="username">
                <span id="usernamevailable"></span>
            </div>           
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" style="width: 500px;" id="password" name="password" >
            </div> 

            <button type="submit"  name="login" class="btn btn-success">Login</button>
            <a href="register.php" class="btn btn-primary"> GO to Register</a>
            </form>

        </div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
     
</body>
</html>