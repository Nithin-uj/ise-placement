<form action="view_s.php" method="get">
    <input type="text" name="usn2" value="<?php echo $_GET['USN']?>"hidden>
    <input type="submit" name="delete_row" value="true" id ="submit" hidden>
</form>

<script>
let userConfirmation = confirm("Do you want to proceed?");
if (userConfirmation) {
  document.getElementById('submit').click();
} else {
  location = "./view_s.php";
}
</script>

