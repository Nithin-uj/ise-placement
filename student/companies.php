<?php
include './function.php';
include '../connection.php';
if(!is_student_login()){

}
else{
    include 'header.php';
    $query = "SELECT * from job";
    $res = mysqli_query($con,$query);
    if($res){
        ?>

        <div class='grid m-2 d-flex flex-wrap'>
            <?php
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
            <div>
            <?php
            $st = $row['State'];
            if($st==0){
                echo "<span class='text-danger'>Expired</span>";
            }
            else if($st==1){
                echo "<span class='text-success my-0'>Active</span>";
                ?>
                <a href="jobapply.php?jid=<?php echo $row['JID']?>" class="btn btn-primary p-1 float-end">Apply</a>
                <?php
            }
            ?>
            </div>
            </li>
            </ul>
            </div>
<?php
        }
        ?></div><?php
        }
    else{
        echo "Error";
    }

    ?>

    <?php
    include '../footer.php';
}
?>