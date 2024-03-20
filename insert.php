<?php
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

    $register_student = $db_handle->insertQuery("INSERT INTO `contest_data`(`student_name`, `parents_name`, `phone`, `secondary_phone`, `class`, `age`, `institution`, `address`, `inserted_at`) VALUES ('$s_name','$p_name','$phone','$s_phone','$class','$age','$institution','$address','$inserted_at')");

    if($register_student){
        echo "
        <script>
        alert('ছাত্র/ছাত্রীর তথ্য সঠিক ভাবে আপলোড হয়েছে!');
        window.location.href = 'Home';
        </script>
        ";
    } else{
        echo "
        <script>
        alert('কোনো সমস্যা হয়েছে। আবার চেষ্ঠা করুন!');
        window.location.href = 'Home';
        </script>
        ";
    }
}