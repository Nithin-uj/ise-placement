<?php
include './function.php';
include '../connection.php';
if(!is_admin_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include 'header.php';
    if(isset($_GET['delete_row']) and isset($_GET['usn2'])){
      $query2 = "DELETE FROM student where USN ='$_GET[usn2]'";
      $result2 = mysqli_query($con,$query2);
      if($result2){
        echo "<div class='alert w-50 m-auto mt-2 alert-danger' id='alert' role='alert'>Student Removed</div>";
      }
      else{
        echo "<div class='alert w-50 m-auto mt-2 alert-danger' id='alert' role='alert'>Failed to Remove</div>";
      }
    }
    $query = "SELECT * FROM student";
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
    <div class="m-4 rounded" style="overflow:scroll;">
    
    <table class="table table-striped ">
  <thead>
    <tr>
      <th scope="col" style="background-color:#f7e38b;">Sl.no</th>
      <th scope="col" style="background-color:#f7e38b;">USN</th>
      <th scope="col" style="background-color:#f7e38b;">Name</th>
      <th scope="col" style="background-color:#f7e38b;">DOB y-m-d</th>
      <th scope="col" style="background-color:#f7e38b;">Branch</th>
      <th scope="col" style="background-color:#f7e38b;">Year</th>
      <th scope="col" style="background-color:#f7e38b;">Sem</th>
      <th scope="col" style="background-color:#f7e38b;">Email</th>
      <th scope="col" style="background-color:#f7e38b;">Phone no</th>
      <th scope="col" style="background-color:#f7e38b;">CGPA</th>
      <th scope="col" style="background-color:#f7e38b;"colspan="2">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $count = 0;
    while($row = mysqli_fetch_array($result)){
    ?>
    <tr>
      <th scope="row"><?php echo ++$count ?></th>
      <td><?php echo $row['USN']?></td>
      <td><?php echo $row['Name']?></td>
      <td><?php echo $row['Date_of_Birth']?></td>
      <td><?php echo $row['Branch']?></td>
      <td><?php echo $row['Year']?></td>
      <td><?php echo $row['Sem']?></td>
      <td><?php echo $row['Email']?></td>
      <td><?php echo $row['Phone_no']?></td>
      <td><?php echo $row['CGPA']?></td>
      <td class="p-1 m-0" style="vertical-align:middle;"><a class="btn btn-warning p-1" href="edit_s.php?USN=<?php echo $row['USN']?>">Edit</a></td>
      <?php //$usn = $row['USN']?>
      <td class="p-1 m-0" style="vertical-align:middle;"><a class="btn btn-danger p-1" href="remove.php?USN=<?php echo $row['USN']?>">Remove</a></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
    </table>
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
    include '../footer.php';
}
?>