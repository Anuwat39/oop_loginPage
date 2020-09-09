<?php

    session_start();

    if(session_destroy()){
    
    echo"<script>alert('Login Successfull!!');</script>";
    echo "<script>window.location.href='welcome.php'</script>";
    header("location: index.php");
    }
?>