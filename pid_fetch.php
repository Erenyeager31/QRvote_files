<?php
session_start();
session_id('pid123');
ini_set('display_errors', 1);
        error_reporting(E_ALL);
global $pid_number;
//echo session_name();
$extra = "hi";
         if(isset($_POST['pidnumb']) && !empty($_POST['pidnumb']))
         {
             $pid_number = $_POST['pidnumb'];
             $_SESSION["number_pid"] = $pid_number;
         }
         echo $pid_number;
         
?>
