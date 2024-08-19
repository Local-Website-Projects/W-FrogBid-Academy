<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printable Table Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
<h1>Students List</h1>

<table>
    <thead>
    <tr>
        <th>Sl No</th>
        <th>Name</th>
        <th>ID</th>
        <th>Class</th>
        <th>Institution</th>
        <th>Phone</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
<?php
$fetch_student = $db_handle->runQuery("SELECT * FROM `contest_data`WHERE status = 1 ORDER BY institution");
$fetch_student_no = $db_handle->numRows("SELECT * FROM `contest_data`WHERE status = 1 ORDER BY institution");
for ($i=0; $i<$fetch_student_no; $i++)
{
    ?>
    <tr>
        <td><?php echo $i+1;?></td>
        <td><?php echo $fetch_student[$i]['student_name'];?></td>
        <td><?php echo $fetch_student[$i]['unique_id'];?></td>
        <td><?php echo $fetch_student[$i]['class'];?></td>
        <td><?php echo $fetch_student[$i]['institution'];?></td>
        <td><?php echo $fetch_student[$i]['phone'];?></td>
        <td><?php if($fetch_student[$i]['result'] == 1) echo 'Yes'; else echo 'No';?></td>
    </tr>
    <?php
}
?>


    </tbody>
</table>



</body>
</html>
