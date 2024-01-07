<?php
if(!is_student_login()){

}
else{
if (isset($_GET['logout'])) {
  logout();
  echo "<script>location='../index.php'</script>";
}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIE Training and Placement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./header.css"/>
</head>
<body>   
    <div class="d-flex m-auto" style="display:flex; justify-content:center;">
       <!-- <img src="nie.jpg" class="m-3" alt="logo" width="400px"> -->
       <div class="d-block m-2">
       <img src="../nie_logo.png" class="p-1 mb-0" alt="logo" width="80px">
       <div style="text-align: center;font-weight:bold;">ESTD : 1946</div>
       </div>
       <div class="d-block m-2">
        <span class="fs-2 sw-bold m-3 my-auto">The National Institute of Engineering</span>
        <div class="fs-6 sw-bold m-3 my-auto">Autonomous Institution, Affiliated to VTU. Recognized by AICTE., Accredited by NAAC, New Delhi</div>
        <div class="fs-4 sw-bold m-3 my-auto">Training and Placement for Information Science and Engineering</div>
       </div>
    </div>
    <div class="alert alert-primary m-0 p-1 px-3 text-end" role="alert">
  <?php echo "USN : $_SESSION[USN]<br>Name : $_SESSION[Name]";?>
</div>
	<nav class="navbar navbar-expand navbar-dark bg-dark">
	  <div class="container-fluid">	    
		  <ul class="navbar-nav me-auto order-0">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
			</li>
			<!--<li class="nav-item">
			  <a class="nav-link" href="#">Student Login</a>
			</li> -->

            <li class="nav-item">
			 <a class="nav-link" href="companies.php">Recruitments</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="acompanies.php">Applied Companies</a> 
			</li>
            </ul>
      <a href="#" class="text-light m-2" style="text-decoration:none">Profile</a>
      <a href="index.php?logout=true" class="text-danger ms-2" style="text-decoration:none">Log out</a>
		</div>
	</nav>
</body>
</html>
<?php
}
?>