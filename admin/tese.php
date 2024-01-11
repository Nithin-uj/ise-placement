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
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
include '../connection.php';
$susn = '4NI21IS068'; // Sanitize input to prevent SQL injection

$query = "SELECT * FROM student WHERE USN = '$susn'";
$result = mysqli_query($con, $query);

if ($result) {
    echo '<table>';
    $row = mysqli_fetch_assoc($result);

    if ($row) {
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
} else {
    echo '<p>Error executing query: ' . mysqli_error($con) . '</p>';
}

mysqli_close($con); // Close the database connection
?>

</body>
</html>

