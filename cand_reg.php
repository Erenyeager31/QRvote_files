<?php
include "dbconnect.php";
$conn = OpenCon();
ini_set('display_errors', 1);
error_reporting(E_ALL);
$nameErr = $pidErr = $deptErr = $divErr = $phoneErr = $positionErr = $promErr = "";
    $name = $pid = $dept = $class = $number = $position = $manifesto = $roll = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Input required
        if (empty($_POST["name"]))
        {$nameErr = "Name is required" ;}
        else {$name = $_POST["name"];}
        
        if(empty($_POST["department"]))
        {$nameErr = "PID is required";}
        else {$dept = $_POST["department"];}
        
        if(empty($_POST["class"])) 
        {$nameErr = "Department is required";}
        else{$class = $_POST["class"];}
        
        if(empty($_POST["roll"]))
        {$nameErr = "Division is required";}
        else{$roll = $_POST["roll"];}
        
        if(empty($_POST["pid"]))
        {$nameErr = "Phone is required";}
        else{$pid = $_POST["pid"];}
        
        if(empty($_POST["position"]))
        {$nameErr = "Position is required";}
        else{$position = $_POST["position"];}
        
        if(empty($_POST["manifesto"]))
        {$nameErr = "Promise is required";}
        else{$manifesto = $_POST["manifesto"];}

        if(empty($_POST["number"]))
        {$nameErr = "Promise is required";}
        else{$number = $_POST["number"];}

        echo $name;
        echo $roll;
        echo $class;
        echo $pid;
        echo $dept;
        echo $manifesto;
        echo $number; 
        echo $position;        
        
        $sql = "Select * from candidate where pid='$pid' or number='$number'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
    
        echo $num;
        if($num==1){
            echo "You have already registered as Candidate";
        }
        else{
            // $sql1 = "INSERT INTO `candidate` (`c_name`, `pid`, `department`, `class`, `number`, `position`,`manifesto`,`roll`) VALUES ('$name', '$pid', '$dept', '$class', '$number', '$position', '$manifesto', '$roll')";
            echo "hi";
            $sql1 = "INSERT INTO `candidate`(`c_name`, `position`, `pid`, `number`, `roll`, `manifesto`, `department`, `class`) VALUES ('$name','$position','$pid','$number','$roll','$manifesto','$dept','$class')";
            echo "hi1";
            $result1 = mysqli_query($conn, $sql1);
            echo $result1;
        }
    }
?>