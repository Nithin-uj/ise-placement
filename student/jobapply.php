<?php
include './function.php';
include '../connection.php';
if(!is_student_login()){

}
else{
    if(isset($_GET['jid'])){
    include 'header.php';
    $query = "SELECT * from job where JID = '$_GET[jid]'";
    $res = mysqli_query($con,$query);
    if($res){
        ?>
        <div class='grid m-2 d-flex flex-wrap'>
            <?php
            $row = mysqli_fetch_assoc($res);
            ?>
            <div class="card m-2">
            <div class="card-header">
            Company Details
            </div>
            <div class="m-2">
            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Company ID : </div>
            <div class="col-6 col-sm-8 col-md-8"><?php echo "$row[JID]"?></div>
            </div>
            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Company Name :</div>
            <div class="col-6 col-sm-8 col-md-8"><?php echo "$row[Company_Name]"?></div>
            </div>
            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Job Role : </div>
            <div class="col-6 col-sm-8 col-md-8"><?php echo "$row[Job_role]"?></div>
            </div>
            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Job Description : </div>
            <div class="col-6 col-sm-8 col-md-8"><?php echo "$row[JD]"?></div>
            </div>
            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Location : </div>
            <div class="col-6 col-sm-8 col-md-8"><?php echo "$row[Location]"?></div>
            </div>
            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Expected CTC in LPA: </div>
            <div class="col-6 col-sm-8 col-md-8"><?php echo "$row[Salary]"?></div>
            </div>

            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Status :</div>
            <div class="col-6 col-sm-8 col-md-8"> 
            <?php
            $st = $row['State'];
            if($st==0){
                echo "<span class='text-danger'>Expired</span>";
            }
            else if($st==1){
                echo "<span class='text-success my-0'>Active</span>";
            }
            ?>
            </div>
            </div>
               <?php
            }
            ?>
            </div>
        </div>
            <!-- -->

            <?php
            $query2 = "SELECT * FROM student where USN = '$_SESSION[USN]'";
            $res2 = mysqli_query($con,$query2);
            $row2 = mysqli_fetch_assoc($res2);
            ?>
            <div class='m-2 w-75'>
            <div class="card">
            <div class="card-header">
            Student Details
            </div>
            <div class="m-2">

            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">USN : </div>
            <div class="col-6 col-sm-8 col-md-8"><?php echo "$row2[USN]"?></div>
            </div>
            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Name : </div>
            <div class="col-6 col-sm-8 col-md-8"><?php echo "$row2[Name]"?></div>
            </div>
            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Date of Birth : </div>
            <div class="col-6 col-sm-8 col-md-8"><?php echo "$row2[Date_of_Birth]"?></div>
            </div>
            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Email ID : </div>
            <div class="col-6 col-sm-8 col-md-8"><?php echo "$row2[Email]"?></div>
            </div>
            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Branch : </div>
            <div class="col-6 col-sm-8 col-md-8"><?php echo "$row2[Branch]"?></div>
            </div>
            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Year : </div>
            <div class="col-6 col-sm-8 col-md-8"><?php echo "$row2[Year]"?></div>
            </div>
            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Semester : </div>
            <div class="col-6 col-sm-8 col-md-8"><?php echo "$row2[Sem]"?></div>
            </div>
            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Current CGPA : </div>
            <div class="col-6 col-sm-8 col-md-8"><?php echo "$row2[CGPA]"?></div>
            </div>
            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Phone No : </div>
            <div class="col-6 col-sm-8 col-md-8"><?php echo "$row2[Phone_no]"?></div>
            </div>
            <div class="text-danger mt-2">Please Input the Followwing Details</div>
            <div class="row g-0 text-start">
            <div class="col-6 col-sm-4 col-md-4 fw-bold">Resume/C.V. </div>
            <div class="col-6 col-sm-8 col-md-8">
            <form name="form" method="post" action="upload.php" enctype="multipart/form-data" >
            <input type="file" name="my_file" />
            </div>
            </div>
            <input type="submit" class="btn btn-success float-end" name="submit" value="Upload"/>
            </form>

            
            </div>
            </div>
            </div>

            </div>
            

        <?php
        ?></div><?php
        }
        ?>

    <?php
    include '../footer.php';
    }
?>