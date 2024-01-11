<?php
include './function.php';
include '../connection.php';
if(!is_admin_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include 'header.php';
    if(isset($_POST['submit'])){
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

        $query = "SELECT * FROM student where USN = '$susn'";
        $result = mysqli_query($con,$query);
        if(!$result){
            echo "Error";
        }
        else{

        
        $que = "INSERT INTO student values ('$susn','$sname','$semail','$sbranch',$syear,$ssem,'$sdob','$scgpa',$sphno,'$dpass')";
        $res = mysqli_query($con,$que);
        if($res){
            echo "<div class='alert alert-success m-2'>Student `$sname` Added Successfully</div>";
        }
        else{
            echo "Error Occured";
        }

        }
    }
    ?>
    <div class="card my-2 m-auto" style="width:400px">
        <div class="card-header" style="text-align:center">
            Enter Student Details
        </div>
        <form action="add_s.php" method="post" class="m-2">
        <div class="form-group row my-2">
            <label for="susn" class="col-4 col-form-label">USN <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="text" class="form-control" name="susn" id="susn" required>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="sname" class="col-4 col-form-label">Name <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="text" class="form-control" name="sname" id="sname" required>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="sdob" class="col-4 col-form-label">Date of Birth <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="date" class="form-control" name="sdob" id="sdob" required>
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
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="ssem" class="col-4 col-form-label">Semester : <span class="text-danger">*</span></label>
            <div class="col-8">
            <select class="form-control" name="ssem" id="ssem" required>
                <option>-- select --</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
            </select>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="scgpa" class="col-4 col-form-label">Current CGPA : <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="decimal" class="form-control" name="scgpa" id="scgpa" required>
            <div class="form-text" id="basic-addon4">0 - 10</div>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="semail" class="col-4 col-form-label">E-mail : <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="email" class="form-control" name="semail" id="semail" required>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="sphno" class="col-4 col-form-label">Mobile no : <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="number" class="form-control" name="sphno" id="sphno" required>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="dpass" class="col-4 col-form-label">Default Password :</label>
            <div class="col-8">
            <input type="text" readonly class="form-control" name="dpass" id="dpass" required value="Student@123">
            <div class="form-text text-danger" id="basic-addon4">Only Students can Change</div>
            </div>
        </div>
        <button type="submit" class="btn btn-success" name="submit" value="submit" style="float:right">Add Student</button>
        </form>
    </div>
    <?php
    include '../footer.php';
}
?>