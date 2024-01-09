<?php
include './function.php';
if(!is_admin_login()){
echo "notlog";
}
else{
    include 'header.php';
}
?>