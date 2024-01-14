<?php
include './function.php';
include '../connection.php';
if(!is_admin_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include 'header.php';

    if(isset($_GET['removejob']) and isset($_GET['jobid'])){

        $query3 = "DELETE FROM applied where JID ='$_GET[jobid]'";
        $result3 = mysqli_query($con,$query3);
        if(!$result3){
            perror();
        }
        else{
        $query2 = "DELETE FROM job where JID ='$_GET[jobid]'";
        $result2 = mysqli_query($con,$query2);
        if($result2){
          echo "<div class='alert w-50 m-auto mt-2 alert-danger' id='alert' role='alert'>Job Removed</div>";
        }
        else{
          echo "<div class='alert w-50 m-auto mt-2 alert-danger' id='alert' role='alert'>Failed to Remove</div>";
        }
      }
      }

    $query = "SELECT * from job";
    $res = mysqli_query($con,$query);
    if($res){
        ?>

        <div class='grid m-2 d-flex flex-wrap' style="background-image:url(./!companybg.jpg)">
            <?php
        while($row = mysqli_fetch_assoc($res)){
            ?>
            <div class="card m-1" style="width: 20rem;">
            <div class="card-header">
            <div class="d-flex" style="justify-content: space-between;">
            <div class="d-flex" style="align-items:center"><b>Job id : <?php echo "$row[JID]";?></b></div>
            <div class="d-flex flex-row-reverse">
            <a href="removejob.php?jid=<?php echo $row['JID'];?>" class="btn btn-outline-danger m-1">Remove</a>
            <a href="edit_j.php?jid=<?php echo $row['JID'];?>" class="btn btn-outline-warning m-1">Edit</a>
            </div>
            </div>
        </div>
            <div class="card-body p-2" style="display:flex;flex-direction: column;justify-content: space-between;">
                <div class="card-title"><?php echo "<b>Company : $row[Company_Name]</b>";?></div>
                <div class="card-subtitle mb-2 text-muted"><b>Role : </b><?php echo $row['Job_role'];?></div>
                <p class="card-text"><b>Job Description : </b><?php echo $row['JD'];?></p>
                <div ><b>Location : </b><?php echo $row['Location'];?></div>
                <div><b>CTC in LPA : </b><?php echo $row['Salary'];?></div>
                <div><b>State : </b><?php if($row['State']==1){echo "<span class='text-success my-0'>Active</span>";}else{echo "<span class='text-danger my-0'>Expired</span>";}?></div>
                <div style="display:flex;flex-direction:row-reverse;"><a href="view_app_s.php?jid=<?php echo $row['JID'];?>" class="btn btn-primary align-right">View Applied Students</a></div>
            </div>
            </div>
<?php
        }
        ?>
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
    else{
        echo "Error";
    }
    include '../footer.php';
}
?>