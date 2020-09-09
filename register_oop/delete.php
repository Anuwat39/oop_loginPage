<?php 

    include_once('functions.php');
    
    session_start();
if( $_SESSION['id']==""){
    header("location: index.php ");

}else{



    if(isset($_GET['del'])){
        $userid = $_GET['del'];
        $daletedate =new DB_con();
        

        $sql = $daletedate->delete($userid);

        if($sql){
            echo "<script>alert('Record Deleted Successfull!')</script>";
            echo "<script>window.location.href='index.php'</script>";
            
        }

    }

    }
?>