<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");
$inserted_at = date("Y-m-d H:i:s");
if (!isset($_SESSION['user'])) {
    echo "
   <script>
   window.location.href = 'Login';
</script>
   ";
}


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $update_status = $db_handle->insertQuery("UPDATE `contest_data` SET `participent_status`='1' WHERE `id` = '$id'");
    if($update_status){
        echo "<script>
alert('Done');
window.location.href='SMS-Status';
</script>";
    }

}