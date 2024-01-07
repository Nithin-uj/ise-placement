<?php 
include 'header.php';
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
    Admin Login
  </div>
  <div class="card-body ">
<form action="adminlogin.php" method="post">
    <?php
    if(isset($_POST['submit'])){
        echo "invalid login id or pass";
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