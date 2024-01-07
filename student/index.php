<?php
include 'function.php';
if(!is_student_login()){
    //echo "<br>sesson usn is not set <br>Not Logged in";
    //print_r($_SESSION);
    echo "<script>location='../index.php'</script>";
}
else{
    //print_r($_SESSION);
    include '../bootstrap.php';
    include 'header.php';
    ?>
    <div>home page // sudnanshu</div>
    <?php
    include '../footer.php';
}
?>