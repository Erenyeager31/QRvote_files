<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "id20424790_d_31";
 $dbpass = "}Go{|P<ohp?Pa0eb";
 $db = "id20424790_qr_vote";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>