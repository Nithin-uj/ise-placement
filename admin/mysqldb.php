<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Result</title>
    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            overflow:hidden;
            border: 2px dotted black;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 4px;
        }
        #ttable{
            overflow: scroll;
            width: 100%;
            padding: 20px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<?php
        include 'function.php';
        if(!is_admin_login()){
        echo "<script>location='../index.php'</script>";
        }
        else{
            include 'header.php';
            ?>
            <form action="mysqldb.php" class="p-3" method="post" style="height:100%">
            <div class="input-group">
            <span class="input-group-text" id="basic-addon1">Query</span>
            <textarea class="form-control" rows="3" name="que"></textarea>
            </div>
            <input type="submit" class="btn btn-success my-2" name="submit" value="submit"/>
            </form>
            <?php
            if(!isset($_POST['submit'])){
                echo "<div style='height:100px'></div>";
            }
            if(isset($_POST['submit'])){
                include '../connection.php';
                $querydata = "$_POST[que]";
                $result = mysqli_query($con, $querydata);

            if($result){
            echo '<div id="ttable">';
            echo '<table>';
            $row = mysqli_fetch_assoc($result);

            if($row){
                echo '<tr>';
                foreach ($row as $key => $value) {
                    echo '<th>' . htmlspecialchars($key) . '</th>';
                }
                echo '</tr>';

                mysqli_data_seek($result, 0); // Reset result set pointer

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    foreach ($row as $value) {
                        echo '<td>' . htmlspecialchars($value) . '</td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<p>No records found.</p>';
            }

            echo '</table>';
            echo '</div>';
        } else {
            echo '<p>Error executing query: ' . mysqli_error($con) . '</p>';
        }
            mysqli_close($con); // Close the database connection
        }
        include '../footer.php';
}
?>