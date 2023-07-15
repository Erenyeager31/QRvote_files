<?php

session_id('123');
session_start(); // start the session
session_unset(); // unset all session variables
session_destroy(); // destroy the session

session_id('pid123');
session_start(); // start the session
session_unset(); // unset all session variables
session_destroy(); // destroy the session

session_id('admin');
session_start(); // start the session
session_unset(); // unset all session variables
session_destroy(); // destroy the session

header("Location: opt_verify.php"); // redirect the user to the login page
exit(); // exit the script

?>