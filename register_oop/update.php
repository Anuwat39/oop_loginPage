<?php

include_once('functions.php');
session_start();
if( $_SESSION['id']==""){
    header("location: index.php ");

}else{


    $updatedate = new DB_con();

    if(isset($_POST['update'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $useremail = $_POST['useremail'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        $userid =  $_SESSION['id'];

        $sql = $updatedate->update($fullname,$username,$useremail,$phonenumber,$address, $userid);
        
        if($sql){
            echo "<script>alert('Update  Successfull!')</script>";
            echo "<script>window.location.href='welcome.php'</script>";
            
        }else{
            echo "<script>alert('Someting went wrong! Please try agian!')</script>";
            echo "<script>window.location.href='update.php'</script>";
        }
    
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>
<body>

        <div class="container">
            <h1 class="mt-5">Update Page</h1>
            <hr>
            <?php 
            
                $userid =  $_SESSION['id'];
                $updateuser = new DB_con();
                
                $sql = $updateuser->fetchonerecord($userid);
                while($row = mysqli_fetch_array($sql)){


            ?>

                <form action="" method="post">
                        <div class="mb-3">
                            <label for="Fullname" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="fullname" 
                            value="<?php echo $row['fullname'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" class="form-control" name="username"
                            value="<?php echo $row['username'] ?>" required>
                        </div>
                        <div class="mb-3 ">
                            <label for="useremail">Email</label>
                            <input type="usereamil" class="form-control" name="useremail" 
                            value="<?php echo $row['useremail'] ?>" required>

                        </div>
                        <div class="mb-3 ">
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" class="form-control" name="phonenumber" 
                            value="<?php echo $row['phonenumber'] ?>" required>

                        </div>
                        <div class="mb-3 ">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" id="" cols="30" rows="10" required><?php echo $row['address'] ?></textarea>
                            
                        </div>


                <?php } ?>
                        <button type="submit" name="update" class="btn btn-success">Update</button>
                </form>


        </div>
    




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
</body>
</html>
<?php
     } 
 ?>