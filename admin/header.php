<?php
if(!is_admin_login()){
  echo "<script>location='../index.php'</script>";
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
    <style>
      *{
        overflow:unset;
      }
    </style>
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
     <div class="alert alert-primary m-0 p-1 px-3 d-flex" role="alert" >
      <div class="h2 fz-bold m-2 w-50">Organization </div>
     <div class="d-flex" style="justify-content:right">
      <div style="width:max-content;">
      <div><?php echo "Name : $_SESSION[aname]"?></div>
      <div><?php echo "Email : $_SESSION[email]";?></div>
      </div>
      </div>
    </div> 
	<nav class="navbar navbar-expand navbar-dark bg-dark">
	  <div class="container-fluid">	    
		  <ul class="navbar-nav me-auto order-0">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
			</li>
       <li class="nav-item">
          <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Student
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="add_s.php">Add Student</a></li>
              <li><a class="dropdown-item" href="view_s.php">View Students</a></li>
              <!-- <li><a class="dropdown-item" href="edit_s.php">Edit Student</a></li> -->
            </ul>
          </div>
			</li>
			<li class="nav-item">
      <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Company
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="add_j.php">Add Job</a></li>
              <li><a class="dropdown-item" href="view_j.php">View Jobs</a></li>
              <!-- <li><a class="dropdown-item" href="edit_j.php">Edit Jobs</a></li> -->
            </ul>
          </div>
			</li>
            </ul>
      <!-- <a href="#" class="text-light m-2" style="text-decoration:none">Profile</a> -->
      <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admin
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="add_j.php">Add Admin</a></li>
              <li><a class="dropdown-item" href="view_j.php">View Admins</a></li>
              <li><a class="dropdown-item" href="mysqldb.php">Mysql Database</a></li>
            </ul>
          </div>
      <a href="index.php?logout=true" class="text-danger ms-2" style="text-decoration:none">Log out</a>
		</div>
	</nav>
</body>
</html>
<?php
}
?>