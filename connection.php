<?php
    $sn = "localhost";
    $username="root";
    $password="Nithin@20";
    $database="ise_placement";
    $con=mysqli_connect($sn,$username,$password,$database);

    if($con){
        //echo"connection success ";
    }
else{
    echo"connection failed";
}
?>