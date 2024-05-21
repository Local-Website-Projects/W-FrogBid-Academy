<?php
class DBController {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "frogbid_acamedy";
    private $from_email='business@frogbidacademy.com';
    private $notification_email='business@frogbidacademy.com';
    private $conn;

    function __construct() {
        if($_SERVER['SERVER_NAME']=="www.frogbidacademy.com"||$_SERVER['SERVER_NAME']=="frogbidacademy.com"){
            $this->host = "localhost";
            $this->user = "u3v6xphswm63g";
            $this->password = ":31~Ji~.45b#";
            $this->database = "dbjr4x0rg4rb9g";
        }

        $this->conn = $this->connectDB();
    }

    function connectDB() {
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $conn;
    }

    function checkValue($value) {
        $value=mysqli_real_escape_string($this->conn, $value);
        return $value;
    }

    function runQuery($query) {
        $result = mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if(!empty($resultset))
            return $resultset;
    }

    function insertQuery($query) {
        $result = mysqli_query($this->conn,$query);
        return $result;
    }

    function from_email(){
        return $this->from_email;
    }

    function numRows($query) {
        $result  = mysqli_query($this->conn,$query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }

    function notify_email(){
        return $this->notification_email;
    }
}
