<?php
include './function.php';
include '../connection.php';
if(!is_admin_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include "header.php";
    $query = "SELECT * FROM admin_details";
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
    <div class="m-4 rounded m-auto my-2 table-responsive-sm w-50" style="overflow:scroll;">
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col" style="">Sl.no</th>
      <th scope="col" style="">Name</th>
      <th scope="col" style="">E-mail</th>
      <!-- <th colspan=2 class="text-center">Operation</th> -->
    </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo ++$count;?></td>
            <td><?php echo $row['Name'];?></td>
            <td><?php echo $row['Email'];?></td>
            <!-- <td><a href="" style="text-decoration:none" class="text-primary">Reset Password</a></td>
            <td><a href="" style="text-decoration:none" class="text-primary">Remove</a></td> -->
        </tr>
        <?php
        }
        ?>
    </tbody>
    </table>
    </div>

    <?php
    }
    include "../footer.php";    
}
    ?>

