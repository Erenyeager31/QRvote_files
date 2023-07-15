<?php
include 'dbconnect.php';
$conn = OpenCon();
ini_set('display_errors', 1);
error_reporting(E_ALL);


$sql = "SELECT * from candidate where position = 'president'";



$x = array();
$y = array();


if(!empty($_POST['position']))
{
    if($_POST['position'] === 'president')
    {
        $sql = "SELECT * from candidate where position = 'president'";
    }
    else if($_POST['position'] === 'General_Secretary')
    {
        $sql = "SELECT * from candidate where position = 'General_secretary'";
    }
    else if($_POST['position'] === 'Technical_Secretary')
    {
        $sql = "SELECT * from candidate where position = 'technical_secretary'";
    }
    else if($_POST['position'] === 'Cultural_Secretary')
    {
        $sql = "SELECT * from candidate where position = 'cultural_secretary'";
    }
    else if($_POST['position'] === 'Reserved_Representative')
    {
        $sql = "SELECT * from candidate where position = 'Reserved_representative'";
    }
    else if($_POST['position'] === 'NSS_Representative')
    {
        $sql = "SELECT * from candidate where position = 'nss_representative'";
    }
    else if($_POST['position'] === 'Lady_Representative')
    {
        $sql = "SELECT * from candidate where position = 'lady_representative'";
    }
    else if($_POST['position'] === 'Sports_Secretary')
    {
        $sql = "SELECT * from candidate where position = 'sports_secretary'";
    }
    
    
    
$result = mysqli_query($conn,$sql);    
if (mysqli_num_rows($result) > 0) {
              //echo "inside";
              while($row = mysqli_fetch_assoc($result)) {
                    //echo "inside 2";
                   $p[] = $row["c_name"];
                   $p_vote[] = $row["count"];
              }
            }
            $data = array(
                'p' => $p,
                'p_vote' => $p_vote
            );
            
            //encode the object as a JSON string
            $json_data = json_encode($data);
            
            echo $json_data;
}
?>