<form action="view_j.php" method="get">
    <input type="text" name="jobid" value="<?php echo $_GET['jid']?>"hidden>
    <input type="submit" name="removejob" value="true" id ="submit" hidden>
</form>

<script>
let userConfirmation = confirm("Do you want to proceed?");
if (userConfirmation) {
  document.getElementById('submit').click();
} else {
  location = "./view_j.php";
}
</script>

