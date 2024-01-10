<?php
include '../connection.php';
include './function.php';
if(!is_student_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include 'header.php';
    $query = "SELECT * FROM applied join job on applied.JID = job.JID where applied.USN = '$_SESSION[USN]'";
    $res = mysqli_query($con,$query);
    if($res){
        if(mysqli_num_rows($res)<1){

            echo "<div style='height:250px';>";
            echo "<div class='alert alert-warning m-2' style='height:100px' role='alert'>No Data Found ! </div>";
            echo "</div>";
        }
        else{
        echo "<div class='grid m-2 d-flex flex-wrap'>";
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <div class="card m-2" style="width:18rem;">
            <div class="card-header">
            <?php echo "<b>$row[JID]  $row[Company_Name]</b>";?>
            </div>
            <ul class="list-group list-group-flush" style="height:100%">
            <li class="list-group-item" style="height:100%;display: flex;flex-direction: column;justify-content: space-between;">
            <div><b>Role : </b><?php echo $row['Job_role'];?></div>
            <div style="height:auto"><b>Job Description : </b><?php echo $row['JD'];?></div>
            <div><b>Location : </b><?php echo $row['Location'];?></div>
            <div><b>CTC in LPA : </b><?php echo $row['Salary'];?></div>
            <div><b>Applied on : </b><?php echo $row['Date'];?></div>
        </div>
        <?php
        }
        echo "</div>";
    }
    }
    else{
        echo "error";
    }

    include '../footer.php';
}
?>