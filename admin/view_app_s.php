<?php
include './function.php';
include '../connection.php';
if(!is_admin_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include 'header.php';

    $que = "SELECT * from job where JID = '$_GET[jid]'";
    $res = mysqli_query($con,$que);
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
            </div>
        </div>
        </div>
               <?php
            }

    $query = "SELECT * FROM applied JOIN student on applied.USN = student.USN where applied.JID = $_GET[jid] order by(CGPA) desc";
    $result = mysqli_query($con,$query);
    if(!$result){
        echo "Server Error";
    }
    else{
        ?>
        <style>
        td,th{
            vertical-align:middle;
        }
    </style>
    <?php
    if(mysqli_num_rows($result)<1){
        echo "<div class='alert alert-warning m-3'>Students Not Yet Applied</div>";
    }
    else{
    ?>
    <div class="alert alert-light m-3">Applied Students</div>
    <div class="m-4 rounded" style="overflow:scroll;">
    <table class="table table-striped ">
  <thead>
    <tr>
      <th scope="col" style="background-color:#f7e38b;">Sl.no</th>
      <th scope="col" style="background-color:#f7e38b;">USN</th>
      <th scope="col" style="background-color:#f7e38b;">Name</th>
      <th scope="col" style="background-color:#f7e38b;">Branch</th>
      <th scope="col" style="background-color:#f7e38b;">Year / Sem</th>
      <th scope="col" style="background-color:#f7e38b;">CGPA</th>
      <th scope="col" style="background-color:#f7e38b;">Email</th>
      <th scope="col" style="background-color:#f7e38b;">Phone no</th>
      <th scope="col" style="background-color:#f7e38b;">Applied Date and Time</th>
      <th scope="col" style="background-color:#f7e38b;">C.V./Resume</th>
    </tr>
  </thead>
  <tbody>
  <tbody>
    <?php
    $count = 0;
    while($row = mysqli_fetch_array($result)){
    ?>
    <tr>
      <th scope="row"><?php echo ++$count ?></th>
      <td><?php echo $row['USN']?></td>
      <td><?php echo $row['Name']?></td>
      <td><?php echo $row['Branch']?></td>
      <td><?php echo $row['Year']." / ".$row['Sem']?></td>
      <td><?php echo $row['CGPA']?></td>
      <td><?php echo $row['Email']?></td>
      <td><?php echo $row['Phone_no']?></td>
      <td><?php echo $row['Date']." & ".$row['Time']?></td>
      <td><a href="../student/cv_resume/<?php echo $row['Resume']?>" target="_blank" class="btn btn-secondary p-1">View</a></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
    </table>
    </div>
    <?php
    }
    }
    include '../footer.php';
}
?>