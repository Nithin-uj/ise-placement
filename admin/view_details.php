<?php
include './function.php';
include '../connection.php';
if(!is_admin_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include 'header.php';
    if(isset($_GET['jid'])){
    ?>
    <style>
        @media screen and (min-width:425px) {
            #card{
                width:75%;
            }
        }
        @media screen and (max-width:425px) {
            #card{
                width:100%;
            }
        }
    </style>
    <div class="card m-auto my-2"id="card">
        <?php
            $query = "SELECT * from job where jid='$_GET[jid]'";
            $res = mysqli_query($con,$query);
            $row = mysqli_fetch_assoc($res);
        ?>
        <div class="card-header">
            <div class="d-flex" style="justify-content: space-between;">
            <div class="d-flex" style="align-items:center"><b>Job id : <?php echo "$_GET[jid]";?></b></div>
            <div class="d-flex flex-row-reverse">
            <button type="button" class="btn btn-outline-danger m-1">Remove</button>
            <button type="button" class="btn btn-outline-warning m-1">Edit</button>
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
                <div style="display:flex;flex-direction:row-reverse;"><a href="view_details.php?jid=<?php echo $row['JID'];?>" class="btn btn-primary align-right">View Applied Students</a></div>
        </div>
    </div>


    <?php
    }
    include '../footer.php';
}
?>