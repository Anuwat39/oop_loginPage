<?php 

    include_once('functions.php');
    session_start();
    if( $_SESSION['id']==""){
        header("location: index.php ");

    }else{
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
    

        <div class="container">
            <h1 class="mt-5 display-3  text-primary" >Welcome <?php  echo $_SESSION['fullname']; ?></h1>
      
        <hr>
        <?php 
            
            $userid = $_SESSION['id'];
            $updateuser = new DB_con();
            
            $sql = $updateuser->fetchonerecord($userid);
            while($row = mysqli_fetch_array($sql)){


        ?>

                <p class="display-4 text-muted">Username: <?php echo $row['username'] ?></p><br>
                <p class="display-4 text-muted">Email: <?php echo $row['useremail'] ?></p><br>
                <h5 class="display-4 text-muted">Phone Number: <?php echo $row['phonenumber'] ?></h5><br>
                <h5 class="display-4 text-muted">Address: <?php echo $row['address'] ?></h5><br>

            <a href="update.php?id=<?php echo $row['id']; ?> "class="btn btn-outline-warning pidding">Edit</a>
            <a href="delete.php?del=<?php echo $row['id']; ?> "class="btn btn-outline-danger">Delete</a>

                <hr>
<?php } ?>

      
        <a href="logout.php" class="btn btn-danger btn-lg btn-block mt-3">Logout</a>
        
        </div>
        <br>
        <br>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
     
</body>
</html>


<?php

    }
?>