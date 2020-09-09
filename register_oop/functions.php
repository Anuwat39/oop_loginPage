<?php

    define('DB_SERVER','localhost'); //You hostname
    define('DB_USER','root'); //Database name
    define('DB_PASS',''); //password
    define('DB_NAME','register_oop');

    class DB_con{
        function __construct(){
            $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
            $this->dbcon = $conn;

            if(mysqli_connect_errno()){
                echo "failed to connect To Mysqli: " .mysqli_connect_error();
            }
        }   

        public function usernameavailable($uname) {
            $chackuser = mysqli_query($this->dbcon, "SELECT username FROM tblusers WHERE username=
            '$uname'");
            return $chackuser;
        }    

        public function registratio($fname, $uname, $uemail, $password,$phonenumber,$address){
                $reg = mysqli_query($this->dbcon,"INSERT INTO tblusers(fullname,username,useremail,password,phonenumber,address) 
                VALUES('$fname', '$uname', '$uemail', '$password','$phonenumber','$address') ");
                return $reg;
        }

        public function signin($uname,$password){
            $signinquery = mysqli_query($this->dbcon,"SELECT id,fullname FROM  tblusers WHERE username=
            '$uname' AND password = '$password'");
            return $signinquery;
        }

        public function fetchdata(){
            $result =mysqli_query($this->dbcon,"SELECT * FROM tblusers");
            return $result;
        }

        public function fetchonerecord($userid){
            $result = mysqli_query($this->dbcon,"SELECT * FROM tblusers WHERE id ='$userid' ");
            return $result;
        }


        public function update($fullname,$username,$useremail,$phonenumber,$address, $userid){
            $result = mysqli_query($this->dbcon,"UPDATE tblusers SET 
            fullname='$fullname', 
            username='$username', 
            useremail='$useremail', 
            phonenumber ='$phonenumber', 
            address ='$address'
            WHERE id = '$userid'

            ");
            return $result;
        }

        public function delete($userid){
            $deleterecord = mysqli_query($this->dbcon,"DELETE FROM tblusers WHERE id = '$userid' ");
            return $deleterecord;
            
         }

    }
?>