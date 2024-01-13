<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIE Training and Placement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

 
    <link rel="stylesheet" href="./header.css"/>
</head>
<body>   


    <nav class="navbar p-2 navbar-expand-md navbar-dark bg-dark">

<a class="navbar-item text-light" style="text-decoration: none;" href="index.php">Home</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">  
    <ul class="navbar-nav me-auto order-0">
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

    <span class="d-md-none">
    <li class="nav-item">  <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admin
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="add_j.php">Add Admin</a></li>
              <li><a class="dropdown-item" href="view_j.php">View Admins</a></li>
              <li><a class="dropdown-item" href="cpass.php">Change Password</a></li>
              <li><a class="dropdown-item" href="mysqldb.php">Mysql Database</a></li>
            </ul>
    </div>
    </li>
    <li class="nav-item"><a href="index.php?logout=true" class="text-danger nav-link" style="text-decoration:none">Log out</a></li>
    </span>
  </ul>

  <span class="d-none d-md-flex">
  <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admin
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="add_j.php">Add Admin</a></li>
              <li><a class="dropdown-item" href="view_j.php">View Admins</a></li>
              <li><a class="dropdown-item" href="cpass.php">Change Password</a></li>
              <li><a class="dropdown-item" href="mysqldb.php">Mysql Database</a></li>
            </ul>
    </div>
  <a href="index.php?logout=true" class="text-danger nav-link align" style="text-decoration:none;display:flex;align-items:center;">Log out</a>
  </span>

  </div>
</nav>


	<!-- <nav class="navbar navbar-expand navbar-dark bg-dark">
	  <div class="container-fluid">	    
		  <ul class="navbar-nav me-auto order-0">
			<li class="nav-item">
			  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
			</li>
       <li class="nav-item">
			 <a class="nav-link" href="companies.php">Companies</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="acompanies.php">Applied Companies</a> 
			</li>
      </ul>
      <a href="profile.php" class="text-light m-2" style="text-decoration:none">Profile</a>
      <a href="index.php?logout=true" class="text-danger ms-2" style="text-decoration:none">Log out</a>
		</div>
	</nav> -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>