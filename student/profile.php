<?php
include './function.php';
include '../connection.php';
if(!is_student_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include 'header.php';
    // ini_set('display_errors', 0);

    $que = "select * from student where USN = '$_SESSION[USN]'";
    $res = mysqli_query($con,$que);
    if(!$res){
        echo "database error";
    }
    else{
        $row = mysqli_fetch_assoc($res);
    ?>
    <div class="card w-75 my-2 m-auto">
        <div class="card-header" style="text-align:center">
            Profile
        </div>
        <?php
                if(isset($_POST['submit1'])){
                    $syear = $_POST['syear'];
                    $sem = $_POST['ssem'];
                    $cgpa = $_POST['cgpa'];
                    $email = $_POST['semail'];
                    $phno = $_POST['sphno'];
                    $que1 = "UPDATE student set Year=$syear,Sem=$sem,CGPA=$cgpa,Email='$email',Phone_no=$phno where USN = '$_SESSION[USN]'";
                    $res1 = mysqli_query($con,$que1);
                    if($res1){
                    echo "<div class='alert alert-success p-2'> Details Updated </div>";
                    }
                    else{
                    echo "<div class='alert alert-danger p-2'>Details Updated Failed </div>";
                    }
                    }
        ?>
        <form action="profile.php" method="post" class="m-2">
        <div class="form-group row my-2">
            <div class="col-4 col-form-label">USN</div>
            <div class="col-8 col-form-label"><?php echo $row['USN'];?></div>
        </div>
        <div class="form-group row my-2">
            <div class="col-4 col-form-label">Name</div>
            <div class="col-8 col-form-label"><?php echo $row['Name'];?></div>
        </div>
        <div class="form-group row my-2">
            <div class="col-4 col-form-label">Date of Birth</div>
            <div class="col-8 col-form-label"><?php echo $row['Date_of_Birth']." (y-m-d)";?></div>
        </div>
        <div class="form-group row my-2">
            <div class="col-4 col-form-label">Branch</div>
            <div class="col-8 col-form-label"><?php echo $row['Branch'];?></div>
        </div>
        <div class="card my-2 m-auto">
        <div class="card-header" style="text-align:center">
            Current Academic Details
        </div>
        <div class="m-2">
        <div class="form-group row my-2">
            <label for="syear" class="col-4 col-form-label">Year<span class="text-danger"> *</span></label>
            <div class="col-8">
            <select name="syear" class="form-control" required id="syear">
                <option >-- Select --</option>
                <option <?php if($row['Year']==1) echo "selected"?> value="1">1</option>
                <option <?php if($row['Year']==2) echo "selected"?> value="2">2</option>
                <option <?php if($row['Year']==3) echo "selected"?> value="3">3</option>
                <option <?php if($row['Year']==4) echo "selected"?> value="4">4</option>
            </select>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="ssem" class="col-4 col-form-label">Semester <span class="text-danger"> *</span></label>
            <div class="col-8">
            <select name="ssem" class="form-control" required id="ssem">
                <option>-- Select --</option>
                <option <?php if($row['Sem']==1) echo "selected"?> value="1">1</option>
                <option <?php if($row['Sem']==2) echo "selected"?> value="2">2</option>
                <option <?php if($row['Sem']==3) echo "selected"?> value="3">3</option>
                <option <?php if($row['Sem']==4) echo "selected"?> value="4">4</option>
                <option <?php if($row['Sem']==5) echo "selected"?> value="5">5</option>
                <option <?php if($row['Sem']==6) echo "selected"?> value="6">6</option>
                <option <?php if($row['Sem']==7) echo "selected"?> value="7">7</option>
                <option <?php if($row['Sem']==8) echo "selected"?>value="8">8</option>
            </select>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="cgpa" class="col-4 col-form-label">CGPA <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="decimal" class="form-control" name="cgpa" id="cgpa" value="<?php echo $row['CGPA']?>" required>
            <div class="form-text" id="basic-addon4">0 - 10</div>
            </div>
        </div>
    </div>

        </div>
        <div class="form-group row my-2">
            <label for="semail" class="col-4 col-form-label">Email <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="email" class="form-control" name="semail" value="<?php echo $row['Email']?>" id="semail" required>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="sphno" class="col-4 col-form-label">Mobile no <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="number" class="form-control" name="sphno" value="<?php echo $row['Phone_no']?>" id="sphno" required>
            </div>
        </div>
        <?php
        }
        ?>
        <button type="submit" class="btn btn-success" name="submit1" value="submit1" style="float:right">Update</button>
        </div>
        </form>
    </div>
    
    <div class="card w-75 my-2 m-auto">
    <div class="card-header"> Change Password</div>
    <form action="profile.php" method="post">
    <div class="m-2">
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
    <?php
    if(isset($_POST['submit2'])){
        $pass = $_POST['ncpass'];
        $que2 = "UPDATE student set password='$pass' where USN = '$_SESSION[USN]'";
        $res2 = mysqli_query($con,$que2);
        if($res2){
        echo "<div class='alert alert-success p-2'> Password Updated </div>";
        }
        else{
        echo "<div class='alert alert-danger p-2'> Password Updated Failed </div>";
        }
    }
    ?>
    <button type="submit" class="btn btn-warning my-2" id="submit2" name="submit2" value="submit2" style="float:right">Update Password</button>
    </div>
        </form>
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