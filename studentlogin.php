<?php 
include 'connection.php';
include 'header.php';
session_start();
?>
<style>
    #csard{
        border:1px solid black;
        border-radius:4px;
        background-color:red;
    }
</style>
<div class="d-flex p-5" style="justify-content:center;">

<div class="rounded-start border-start border-top border-bottom " style="width:300px">
<img src="companies.jpg" alt="image" width="100%"/>
</div>

<div class="card rounded-0 rounded-end" style="width:300px" id="card">
<div class="card-header" style="text-align:center">
    Student Login
  </div>
  <div class="card-body ">
<form action="studentlogin.php" method="post">
    <?php
    if(isset($_POST['submit'])){
      $usn = $_POST['usn'];
      $pass =  $_POST['pass'];
    
      $query = "select * from student where USN = '$usn' and password = '$pass'";
      $res = mysqli_query($con,$query);
      if($res){
        if(mysqli_num_rows($res)<1){
          echo "<div class='alert alert-danger p-1' role='alert'>
          Invalid USN or Password
        </div>
        ";
        $_SESSION["USN"] = null;
        }
        else{
          $row = mysqli_fetch_assoc($res);
          $_SESSION["USN"] = $row['USN'];
          $_SESSION["Name"] = $row['Name'];
          echo "<script>window.location='./student'</script>";
        }
      }
      else{
        echo "error";
      }
    }
    ?>
  <div class="form-group">
    <label for="usn">Student USN : </label>
    <input type="text" class="form-control" id="usn" aria-describedby="emailHelp" placeholder="Enter Student USN" name="usn" required>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password" required>
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember me !</label>
  </div>
  <button type="submit" class="btn btn-primary float-end" name="submit" value="submit">Submit</button>
</form>
</div>
</div>
</div>

<?php 
include 'footer.php';
?>