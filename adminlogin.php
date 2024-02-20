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
    #container{
      /* background-color: red; */
      background-image:url(niesouth.jpg);
    }
</style>
<link rel="stylesheet" href="studentlogin.css">
<div class="d-flex p-3" id="container" style="justify-content:center;">

<div class="rounded-start border-start border-top border-bottom" id="bleft" style="width:300px">
<img src="companies.jpg" alt="image" width="100%"/>
</div>

<div class="card rounded-0 rounded-end" style="width:300px" id="bright"  id="card">
<div class="card-header" style="text-align:center">
    Admin Login
  </div>
  <div class="card-body ">
<form action="adminlogin.php" method="post">
    <?php
    if(isset($_POST['submit'])){
      $email = $_POST['email'];
      $pass =  $_POST['pass'];
      $query = "select * from admin_details where Email = '$email' and Password = '$pass'";
      $res = mysqli_query($con,$query);
      if($res){
        if(mysqli_num_rows($res)<1){
          echo "<div class='alert alert-danger p-1' role='alert'>
          Invalid Email or Password
        </div>
        ";
        $_SESSION["email"] = null;
        }
        else{
          $row = mysqli_fetch_assoc($res);
          $_SESSION["email"] = $row['Email'];
          $_SESSION["aname"] = $row['Name'];
          echo "<script>window.location='./admin'</script>";
        }
      }
      else{
        echo "error";
      }
    }
    ?>
    <!--

-->
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
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