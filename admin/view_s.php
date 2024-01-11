<?php
include './function.php';
include '../connection.php';
if(!is_admin_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include 'header.php';
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
      <th scope="col">Sl.no</th>
      <th scope="col">USN</th>
      <th scope="col">Name</th>
      <th scope="col">DOB y-m-d</th>
      <th scope="col">Branch</th>
      <th scope="col">Year</th>
      <th scope="col">Sem</th>
      <th scope="col">Email</th>
      <th scope="col">Phone no</th>
      <th scope="col">CGPA</th>
      <th scope="col" colspan="2">Operation</th>
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
      <td class="p-1 m-0" style="vertical-align:middle;"><a class="btn btn-warning p-1">Edit</a></td>
      <?php //$usn = $row['USN']?>
      <td class="p-1 m-0" style="vertical-align:middle;"><a class="btn btn-danger p-1" href="remove.php?USN=<?php echo $row['USN']?>">Remove</a></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
    </table>
    </div>
    <?php
    }
    include '../footer.php';
}
?>