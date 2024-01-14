<?php
include './function.php';
include '../connection.php';
if(!is_admin_login()){
    echo "<script>location='../index.php'</script>";
}
else{
    include 'header.php';
    if(isset($_POST['submit'])){
        $query = "INSERT INTO admin_details values('$_POST[aname]','$_POST[aemail]','$_POST[cpass]')";
        $result = mysqli_query($con,$query);
        if($result){
            ?>
            <div class="alert alert-warning alert-dismissible m-3 fade show" role="alert">Admin Added Successfully
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
        else{
            perror();
        }
    }
    ?>
    <style>
    #container{
        background-image: url(companybg.jpg);
    }
    </style>
    <div id="container" class="py-2">
    <div class="card m-auto" style="width:400px">
    <div class="card-header" style="text-align:center">
        Enter Admin Details
    </div>
    <form action="add_admin.php" method="post" class="m-2">
    <div class="form-group row my-2">
        <label for="aname" class="col-4 col-form-label">Name <span class="text-danger">*</span></label>
        <div class="col-8">
        <input type="text" class="form-control" name="aname" id="aname" required>
        </div>
    </div>
    <div class="form-group row my-2">
        <label for="aemail" class="col-4 col-form-label">E-mail <span class="text-danger">*</span></label>
        <div class="col-8">
        <input type="email" class="form-control" name="aemail" id="aemail" required>
        </div>
    </div>
    <div class="form-group row my-2">
        <label for="pass" class="col-4 col-form-label">Password <span class="text-danger">*</span></label>
        <div class="col-8">
        <input type="password" class="form-control" name="pass" id="pass" required>
        </div>
    </div>
    <div class="form-group row my-2">
        <label for="cpass" class="col-4 col-form-label">Confirm Password <span class="text-danger">*</span></label>
        <div class="col-8">
        <input type="password" class="form-control" oninput="validate()" name="cpass" id="cpass" required>
            <div class="form-text text-danger" id="pnm">Password Not Maching</div>
            <div class="form-text text-success" id="pm">Password Maching</div></div>
        </div>
    <input type="submit" id="sub" class="btn btn-success float-end" name="submit" value="Add">
    </div>
    </div>
    <script>
            document.getElementById('pm').style.display = 'none';
            document.getElementById('pnm').style.display = 'none';
            function validate(){
                let p1 = document.getElementById('pass').value;
                let p2 = document.getElementById('cpass').value;

                if(p1===p2){
                    document.getElementById('pnm').style.display = 'none';
                    document.getElementById('pm').style.display = 'block';
                    document.getElementById('sub').disabled =false;
                }
                else{
                    document.getElementById('pm').style.display = 'none';
                    document.getElementById('pnm').style.display = 'block';
                    document.getElementById('sub').disabled =true;
                }
            }
        </script>

    <?php
    include '../footer.php';
}
?>