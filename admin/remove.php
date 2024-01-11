<?php
include './function.php';
include '../connection.php';
if(!is_admin_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    if(isset($_GET['USN'])){
        echo $_GET['USN'];
    }
}
?>
