<?php
include './function.php';
if(!is_admin_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include 'header.php';
    ?>
    //content pending
    <?php
    include '../footer.php';
}
?>