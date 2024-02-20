<?php
include './function.php';
include '../connection.php';
if(!is_admin_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include "header.php";
    if(isset($_GET['removeadmin'])){
        ?>
        <form action="view_admins.php" method="get">
            <input type="text" name="cremoveadmin" value="<?php echo $_GET['removeadmin']?>"hidden>
            <input type="submit" name="delete_row" value="true" id ="submit" hidden>
        </form>

        <script>
        let userConfirmation = confirm("Please Confirm to Remove admin");
        if (userConfirmation) {
        document.getElementById('submit').click();
        } else {
        location = "./view_admins.php";
        }
        </script>
        <?php
    }
    if(isset($_GET['reset_pass'])){
        $que1 = "UPDATE admin_details set Password='Admin@123' where Email='$_GET[reset_pass]'";
        $res1 = mysqli_query($con,$que1);
        if($res1){
            ?>
            <div class="alert alert-warning alert-dismissible fade show m-2" role="alert">
                Password Reseted to `Admin@123`
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
        else{
            perror();
        }
    }
    if(isset($_GET['cremoveadmin'])){
        $que1 = "DELETE from admin_details where Email='$_GET[cremoveadmin]'";
        $res1 = mysqli_query($con,$que1);
        if($res1){
            ?>
            <div class="alert alert-warning alert-dismissible fade show m-2" role="alert">
                Admin Removed
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
        else{
            perror();
        }
    }
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
      <th colspan=2 class="text-center">Operation</th>
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
            <td><a href="view_admins.php?reset_pass=<?php echo $row['Email']; ?>" style="text-decoration:none" class="btn btn-outline-warning ">Reset Password</a></td>
            <td><a href="view_admins.php?removeadmin=<?php echo $row['Email']; ?>" style="text-decoration:none" class="btn btn-outline-danger">Remove</a></td>
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

