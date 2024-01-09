<?php
session_start();
    function is_student_login(){
        if(isset($_SESSION['USN'])){
            return true;
        }
        else{
        //echo "Not Logged in <br>";
        return false;
        }
    }
    function logout(){
        session_destroy();
    }

    function perror(){
        echo "<div class='alert alert-danger m-2 ' role='alert'>Error Occured</div>";
    }
?>