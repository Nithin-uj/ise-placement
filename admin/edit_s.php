<?php
include './function.php';
include '../connection.php';
if(!is_admin_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include 'header.php';
    if(isset($_POST['submit'])){
        $ousn = $_POST['ousn'];
        $susn = $_POST['susn'];
        $sname = $_POST['sname'];
        $sdob = $_POST['sdob'];
        $sbranch = $_POST['sbranch'];
        $syear = $_POST['syear'];
        $ssem = $_POST['ssem'];
        $scgpa = $_POST['scgpa'];
        $semail = $_POST['semail'];
        $sphno = $_POST['sphno'];
        $dpass = $_POST['dpass'];

        // echo $susn;
        // echo "<br> old:".$ousn;
        // echo "<br>".$sname;
        // echo "<br>".$sdob;
        // echo "<br>".$sbranch;
        // echo "<br>".$syear;
        // echo "<br>".$ssem;
        // echo "<br>".$scgpa;
        // echo "<br>".$semail;
        // echo "<br>".$sphno;
        // echo "<br>".$dpass;

        $que = "UPDATE student SET USN='$susn',Name='$sname',Email='$semail',Branch='$sbranch',Year='$syear',Sem='$ssem',Date_of_Birth='$sdob',CGPA='$scgpa',Phone_no='$sphno',password='$dpass' WHERE USN = '$ousn'";
        $res = mysqli_query($con,$que);
        if($res){
            echo "<div style='height:200px'>"; 
            echo "<div class='alert alert-success m-2' id='alert'>Updated Successfully</div>";
            echo "</div>";
        }
        else{
            echo "Error Occured";
        }
    }
    if(isset($_GET['USN'])){
        $que = "SELECT * FROM student where USN = '$_GET[USN]'";
        $res = mysqli_query($con,$que);
        if(mysqli_num_rows($res)==0){
            perror();
        }
        else{
        $row = mysqli_fetch_assoc($res);
    ?>
    <style>
        #container{
            background-image: url(companybg.jpg);
        }
    </style>
    <div id="container" class="py-2">
    <div class="card m-auto" style="width:400px">
        <div class="card-header" style="text-align:center">
            Edit Student Details
        </div>
        <form action="edit_s.php" method="post" class="m-2">
        <div class="form-group row my-2">
            <label for="susn" class="col-4 col-form-label">USN <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="text" class="form-control" name="ousn" id="susn" hidden required value='<?php echo $row['USN']; ?>'>
            <input type="text" class="form-control" name="susn" id="susn" required value='<?php echo $row['USN']; ?>'>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="sname" class="col-4 col-form-label">Name <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="text" class="form-control" name="sname" id="sname" required value='<?php echo $row['Name']; ?>'>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="sdob" class="col-4 col-form-label">Date of Birth <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="date" class="form-control" name="sdob" id="sdob" required value='<?php echo $row['Date_of_Birth']; ?>'>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="sbranch" class="col-4 col-form-label">Branch <span class="text-danger">*</span></label>
            <div class="col-8">
            <select class="form-control" name="sbranch" id="sbranch" required>
                <!--<option>-- select --</option>
                <option>AIML</option>
                <option>CSE</option>
                <option>CV</option>
                <option>ECE</option>
                <option>EEE</option>
                <option>ME</option> -->
                <option>ISE</option>
            </select>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="syear" class="col-4 col-form-label">Year : <span class="text-danger">*</span></label>
            <div class="col-8">
            <select class="form-control" name="syear" id="syear" required>
                <option>-- select --</option>
                <option <?php if($row['Year']==1){echo 'selected';} ?> >1</option>
                <option <?php if($row['Year']==2){echo 'selected';} ?> >2</option>
                <option <?php if($row['Year']==3){echo 'selected';} ?> >3</option>
                <option <?php if($row['Year']==4){echo 'selected';} ?> >4</option>
            </select>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="ssem" class="col-4 col-form-label">Semester : <span class="text-danger">*</span></label>
            <div class="col-8">
            <select class="form-control" name="ssem" id="ssem" required>
                <option>-- select --</option>
                <option <?php if($row['Sem']==1){echo 'selected';} ?> >1</option>
                <option <?php if($row['Sem']==2){echo 'selected';} ?> >2</option>
                <option <?php if($row['Sem']==3){echo 'selected';} ?> >3</option>
                <option <?php if($row['Sem']==4){echo 'selected';} ?> >4</option>
                <option <?php if($row['Sem']==5){echo 'selected';} ?> >5</option>
                <option <?php if($row['Sem']==6){echo 'selected';} ?> >6</option>
                <option <?php if($row['Sem']==7){echo 'selected';} ?> >7</option>
                <option <?php if($row['Sem']==8){echo 'selected';} ?> >8</option>
            </select>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="scgpa" class="col-4 col-form-label">Current CGPA : <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="decimal" class="form-control" name="scgpa" id="scgpa" value='<?php echo $row['CGPA']; ?>' required>
            <div class="form-text" id="basic-addon4">0 - 10</div>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="semail" class="col-4 col-form-label">E-mail : <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="email" class="form-control" name="semail" id="semail" value='<?php echo $row['Email']; ?>' required>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="sphno" class="col-4 col-form-label">Mobile no : <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="number" class="form-control" name="sphno" id="sphno" value='<?php echo $row['Phone_no']; ?>' required>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="dpass" class="col-4 col-form-label">Default Password :</label>
            <div class="col-8">
            <input type="text" readonly class="form-control" name="dpass" id="dpass" required value="Student@123">
            <div class="form-text text-danger" id="basic-addon4">Password Will be Change to Defalut</div>
            <div class="form-text text-danger" id="basic-addon4">Only Students can Change</div>
            </div>
        </div>
        <button type="submit" class="btn btn-warning" name="submit" value="submit" style="float:right">Update</button>
        </form>
    </div>
    </div>
    <?php
    }
    ?>

    <script>
    setTimeout(() => {
        const alertElement = document.getElementById("alert");
        if (alertElement) {
          alertElement.style.display = "none";
        }
      }, 2000);
    </script>
    <?php
    }
    include '../footer.php';
}
?>