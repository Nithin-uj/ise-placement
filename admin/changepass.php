<?php
include './function.php';
include '../connection.php';
if(!is_admin_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include 'header.php';
    if(isset($_POST['submit2'])){
        $opass = $_POST['opass'];
        $pass = $_POST['ncpass'];

        $que1 = "SELECT count(*) as nums FROM admin_details where Email = '$_SESSION[email]' and Password='$opass'";
        $res1 = mysqli_query($con,$que1);
        if(!$res1){
        }
        else{
            $row = mysqli_fetch_assoc($res1);
            if($row['nums']<1){
            echo "<div class='alert alert-danger m-2 '>Admin Details Not found or Incorret old password </div>";
            }
            else{
            $que2 = "UPDATE admin_details set password='$pass' where Email = '$_SESSION[email]' and Password='$opass'";
            $res2 = mysqli_query($con,$que2);
            if($res2){
            echo "<div class='alert alert-success p-2'> Password Updated </div>";
            }
            else{
            echo "<div class='alert alert-danger p-2'> Password Updated Failed </div>";
            }
            }
        }
    }
    ?>
    <div class="card w-75 my-2 m-auto">
    <div class="card-header"> Change Password</div>
    <form action="changepass.php" method="post">
    <div class="m-2">
    <div class="form-group row my-2">
            <label for="opass" class="col-5 col-form-label">Old Password <span class="text-danger">*</span></label>
            <div class="col-7">
            <input type="password" class="form-control" name="opass" id="opass" required>
            </div>
    </div>
    <div class="form-group row my-2">
            <label for="npass" class="col-5 col-form-label">New Password <span class="text-danger">*</span></label>
            <div class="col-7">
            <input type="password" class="form-control" name="npass" id="npass" required>
            </div>
    </div>
    <div class="form-group row my-2">
            <label for="ncpass" class="col-5 col-form-label">Confirm Password <span class="text-danger">*</span></label>
            <div class="col-7">
            <input type="password" class="form-control" name="ncpass" id="ncpass" oninput="validate()" required>
            <div class="form-text text-success" id="pm">Password Matching</div>
            <div class="form-text text-danger" id="pnm">Password not Matching</div>
            </div>
    </div>

    <button type="submit" class="btn btn-warning my-2" id="submit2" name="submit2" value="submit2" style="float:right">Update Password</button>
    </div>
    </div>
    <script>
            document.getElementById('pm').style.display = 'none';
            document.getElementById('pnm').style.display = 'none';

            function validate(){
                let p1 = document.getElementById('npass').value;
                let p2 = document.getElementById('ncpass').value;

                if(p1===p2){
                    document.getElementById('pnm').style.display = 'none';
                    document.getElementById('pm').style.display = 'block';
                    document.getElementById('submit2').disabled =false;
                }
                else{
                    document.getElementById('pm').style.display = 'none';
                    document.getElementById('pnm').style.display = 'block';
                    document.getElementById('submit2').disabled =true;
                }
            }
        </script>
    <?php

    include '../footer.php';
}
?>