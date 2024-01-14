<?php
include './function.php';
include '../connection.php';
if(!is_admin_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include "header.php";
    if(isset($_POST['submit'])){

        $que = "UPDATE job SET Company_Name='$_POST[cname]',Job_role='$_POST[jrole]',JD='$_POST[jd]',Location='$_POST[jl]',Salary='$_POST[ctc]',State=$_POST[state] WHERE JID = '$_POST[jid]'";
        $res = mysqli_query($con,$que);
        if($res){
            echo "<div  style='height:500px'><div class='alert m-2 alert-success'>Updated Successfully</div></div>";
        }
        else{
            perror();
        }
    }
    if(isset($_GET['jid'])){
        $query = "SELECT * FROM job where JID='$_GET[jid]'";
        $result = mysqli_query($con,$query);
        if(!$result){
            echo "Error";
        }
        else{
            $row = mysqli_fetch_assoc($result);
    ?>
    <div id="container" class="py-2">
    <div class="card m-auto" style="width:500px">
        <div class="card-header" style="text-align:center">
            Edit Job Details
        </div>
        <form action="edit_j.php" method="post" class="m-2">
        <div class="form-group row my-2">
            <label for="jid" class="col-4 col-form-label">JOB ID <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="int" class="form-control" name="jid" id="jid" readonly required value="<?php echo $row['JID']; ?>">
            <div class="form-text text-danger" id="basic-addon4">Can not edit Job ID</div>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="cname" class="col-4 col-form-label">Company Name <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="text" class="form-control" name="cname" id="cname" value="<?php echo $row['Company_Name']; ?>" required>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="jrole" class="col-4 col-form-label">Job Role <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="text" class="form-control" name="jrole" id="jrole" value="<?php echo $row['Job_role']; ?>" required>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="jd" class="col-4 col-form-label">Job Description <span class="text-danger">*</span></label>
            <div class="col-8">
            <textarea id="largeInput" class="form-control" name="jd" required maxlength="65535"><?php echo $row['JD']; ?></textarea>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="jl" class="col-4 col-form-label">Job Location<span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="text" class="form-control" name="jl" id="jl" value="<?php echo $row['Location']; ?>" required>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="ctc" class="col-4 col-form-label">Expected CTC in LPA<span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="text" class="form-control" name="ctc" id="ctc"value="<?php echo $row['Salary']; ?>" required>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="state" class="col-4 col-form-label">State<span class="text-danger">*</span></label>
            <div class="col-8">
            <label class="m-2">
            <input type="radio" name="state" <?php if($row['State']==1) echo "checked"; ?> required value="1"> Accept
            </label>
            <label class="m-2">
            <input type="radio" name="state" <?php if($row['State']==0) echo "checked"; ?> required value="0"> Don't Accept
            </label>
            </div>
        </div>
        <input type="submit" class="btn btn-warning float-end" value="Update" name="submit">
    </div>
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
        }
    include "../footer.php";
}
?>