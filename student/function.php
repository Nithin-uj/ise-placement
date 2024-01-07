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
?>