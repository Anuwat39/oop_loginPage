<?php
 include_once('functions.php');
 $userdata = new DB_con();

 if(isset($_POST['submit'])){
     $fname = $_POST['fullname'];
     $uname = $_POST['username'];
     $uemail = $_POST['email'];
     $password = md5($_POST['password']);
     $phonenumber = $_POST['phonenumber'];
     $address = $_POST['address'];



     $sql = $userdata->registratio($fname,$uname,$uemail,$password,$phonenumber,$address);
    
     if($sql){
        echo"<script>alert('Register Successfull!!');</script>";
        echo "<script>window.location.href='index.php'</script>";
     }else{
        echo"<script>alert('Sumeting went wrong Please try again. ');</script>";
        echo "<script>window.location.href='register.php'</script>";
     }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
            
        <div class="container">
            <h1 class="m-3">Register Page</h1>
            <hr>
            <form method="post">
            <div class="form-group">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="username" name="fullname" >
            </div>
            <div class="form-group">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="username" name="username" onblur="chackusername(this.val)">
                <span id="usernamevailable"></span>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" >
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" >
            </div> 

            <div class="form-group">
                <label for="phonenumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phonenumber" name="phonenumber" >
            </div> 
            <div class="mb-3 ">
            <label for="address">Address</label>
            <textarea name="address" class="form-control" id="" cols="30" rows="10" required></textarea>
            </div>

            <button type="submit"  name="submit" id="submit" class="btn btn-success">Register</button>
            </form>

        </div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
   
   function chackusername(val){
        $.ajax({
            type:'POST',
            url:'checkuser_available.php',
            data:'username='+val,
            success: function(date){
                $(' #usernamevailable').html(date);
            }
        });
   }

</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
     
</body>
</html>