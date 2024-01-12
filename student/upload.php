<?php
include './function.php';
include '../connection.php';
// error_reporting(0);

if(!is_student_login()){
   echo "<script>location='../index.php'</script>";
}
else{
include 'header.php';
echo "<div style='height:250px';>";
if(isset($_FILES['my_file']['name'])){
if (($_FILES['my_file']['name']!="")){
        $jid = $_POST['jid'];
        //Where the file is going to be stored
        $target_dir = "cv_resume/";
        $file = $_FILES['my_file']['name'];
        $path = pathinfo($file);
        if(isset($path['extension']) && isset($path['filename'])){
        $filename = $path['filename'];
        $ext = $path['extension'];
        

        //echo $file."<br>";
        //echo $filename."<br>";
        //echo $ext."<br>";
        //print_r($path);
        //echo "<br><br>";

        $temp_name = $_FILES['my_file']['tmp_name'];
        //$path_filename_ext = $target_dir.$filename.".".$ext;
        $path_filename_ext = $target_dir.$jid."_".$_SESSION['USN'].".".$ext;
        $filename_db = $jid."_".$_SESSION['USN'].".".$ext;
        //echo $path_filename_ext."<br>";
     
     // Check if file already exists

     if($_FILES['my_file']['size']>2000000){
     //echo "Sorry, your file is too large.";
     echo "<div class='alert alert-danger m-2' role='alert'>Failed to Apply <br> File size is too Large </div>";
      }
     else{
      if(file_exists($path_filename_ext)){
         //echo "Sorry, file already exists.";
         //echo "<div class='alert alert-danger m-2' style='height:100px' role='alert'>Failed to Apply</div>";
          $toremove = $target_dir.$filename_db;
          $removed = unlink($toremove);
         //  echo $removed."removed";
         }

     $status =  move_uploaded_file($temp_name,$path_filename_ext);
     //echo $status;
      // echo $jid."<br>";
      // echo $_SESSION['USN']."<br>"; 
      // echo $filename_db."<br>";
      // echo date("d-m-Y")."<br>";
      // echo date("h:i:s");
      if($status){
     $flag = 0;
     $query = "INSERT INTO applied values('$_SESSION[USN]','$jid',CURRENT_DATE,CURRENT_TIME,'$filename_db')";
     $resu = mysqli_query($con,$query);

     if($resu){
     //echo "Congratulations! File Uploaded Successfully.";
     echo "<div class='alert alert-success m-2' role='alert'>Applied Successfully</div>";
     echo "<div class='text-center'><a href='companies.php' class='btn btn-primary mx-2'>Click here</a></div>";
     }
     else{
      echo "<div class='alert alert-danger m-2' style='height:100px' role='alert'>Database Error  <br>Please Try Again</div>";
     }
   }
   else{
      echo "<div class='alert alert-danger m-2' style='height:100px' role='alert'>Failed to Upload c.v. Resume <br>Please Try Again</div>";
   }
     }
     }
     echo "</div>";
    }
}
else{
    perror();
}
     include '../footer.php';
}
?>