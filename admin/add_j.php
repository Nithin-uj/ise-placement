<?php
include './function.php';
include '../connection.php';
if(!is_admin_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include "header.php";
    if(isset($_POST['submit'])){

        $que1 = "SELECT JID from job where JID='$_POST[jid]'";
        $res1 = mysqli_query($con,$que1);
        if(!$res1){
            echo "Error";
        }
        else{
        if(mysqli_num_rows($res1)>0){
            echo "<div id='alert' class='alert alert-warning m-2'>Job ID Exist</div>";
        }
        else{
            $que2 = "INSERT INTO job values ($_POST[jid],'$_POST[cname]','$_POST[jrole]','$_POST[jd]','$_POST[jl]',$_POST[ctc],$_POST[state])";
            $res2 = mysqli_query($con,$que2);
            if($res2){
                echo "<div id='alert' class='alert alert-success m-2'>Added Successfully</div>";
            }
            else{
                echo "<div id='alert' class='alert alert-danger m-2'>Something Went Wrong</div>";
            }
        }
        }

    }

    ?>
    <style>
    #container{
        background-image: url(companybg.jpg);
    }
    </style>
    <div id="container" class="py-2">
    <div class="card m-auto my-3" style="width:500px">
        <div class="card-header" style="text-align:center">
            Enter Job Details
        </div>
        <form action="add_j.php" method="post" class="m-2">
        <div class="form-group row my-2">
            <?php
                    $njid = 0;
                    $query = "SELECT max(JID) as njid FROM job";
                    $result = mysqli_query($con,$query);
                    if(!$result){
                        echo "Error";
                        $njid = null;
                    }
                    else{
                        $row = mysqli_fetch_assoc($result);
                        $njid = $row['njid']+1;
                    }
            ?>
            <label for="jid" class="col-4 col-form-label">JOB ID <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="int" class="form-control" name="jid" id="jid" required value="<?php echo $njid; ?>">
            <div class="form-text text-danger" id="basic-addon4">Recommended</div>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="cname" class="col-4 col-form-label">Company Name <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="text" class="form-control" name="cname" id="cname" required>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="jrole" class="col-4 col-form-label">Job Role <span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="text" class="form-control" name="jrole" id="jrole" required>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="jd" class="col-4 col-form-label">Job Description <span class="text-danger">*</span></label>
            <div class="col-8">
            <textarea id="largeInput" class="form-control" name="jd" required maxlength="65535"></textarea>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="jl" class="col-4 col-form-label">Job Location<span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="text" class="form-control" name="jl" id="jl" required>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="ctc" class="col-4 col-form-label">Expected CTC in LPA<span class="text-danger">*</span></label>
            <div class="col-8">
            <input type="text" class="form-control" name="ctc" id="ctc" required>
            </div>
        </div>
        <div class="form-group row my-2">
            <label for="state" class="col-4 col-form-label">State<span class="text-danger">*</span></label>
            <div class="col-8">
            <label class="m-2">
            <input type="radio" name="state" required value="1"> Accept
            </label>
            <label class="m-2">
            <input type="radio" name="state" required value="0"> Don't Accept
            </label>
            </div>
        </div>
        <input type="submit" class="btn btn-success float-end" value="Add" name="submit">
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
    include "../footer.php";
}
?>