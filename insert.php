<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$inserted_at = date("Y-m-d H:i:s");

if(isset($_POST['register'])){
    $s_name = $db_handle->checkValue($_POST['s_name']);
    $p_name = $db_handle->checkValue($_POST['p_name']);
    $phone = $db_handle->checkValue($_POST['phone']);
    $s_phone = $db_handle->checkValue($_POST['s_phone']);
    $age = $db_handle->checkValue($_POST['age']);
    $class = $db_handle->checkValue($_POST['class']);
    $institution = $db_handle->checkValue($_POST['institution']);
    $address = $db_handle->checkValue($_POST['address']);

    $check_number = $db_handle->numRows("select * from contest_data where phone = '$phone'");

    if($check_number > 0){
        $_SESSION['report'] = 3;
        echo "
        <script>
        window.location.href = 'Home';
        </script>
        ";
    } else {
        $register_student = $db_handle->insertQuery("INSERT INTO `contest_data`(`student_name`, `parents_name`, `phone`, `secondary_phone`, `class`, `age`, `institution`, `address`, `inserted_at`) VALUES ('$s_name','$p_name','$phone','$s_phone','$class','$age','$institution','$address','$inserted_at')");

        if($register_student){
            $_SESSION['report'] = 1;
            echo "
        <script>
        window.location.href = 'Home';
        </script>
        ";
        } else{
            $_SESSION['report'] = 2;
            echo "
        <script>
        window.location.href = 'Home';
        </script>
        ";
        }
    }
}