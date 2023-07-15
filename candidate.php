<?php
include "dbconnect.php";
$conn = OpenCon();
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
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

        // echo $name;
        // echo $roll;
        // echo $class;
        // echo $pid;
        // echo $dept;
        // echo $manifesto;
        // echo $number; 
        // echo $position;        
        
        $sql = "Select * from candidate where pid='$pid' or number='$number'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
    
        //echo $num;
        if($num==1){
            //echo "You have already registered as Candidate";
        }
        else{
            $sql = "INSERT INTO candidate (`c_name`, `position`, `pid`, `number`, `roll`, `manifesto`, `department`, `class`) VALUES ('$name','$position','$pid','$number','$roll','$manifesto','$dept','$class')";
            $result1 = mysqli_query($conn, $sql);
            echo mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Candidate Registration</title>
        <link rel="stylesheet" href="Mainpage.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/309cf469ef.js" crossorigin="anonymous"></script>

<style>
    * {
        margin: 0;
        padding: 0;
        text-decoration: none;
        font-family: montserrat;
        box-sizing: border-box;
    }
    
    form{
        margin-top:50px;
    }

    .details {
        width: 360px;
        background-color: #f1f1f1;
        height: 580px;
        padding: 80px 40px;
        border-radius: 10px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .details h1 {
        text-align: center;
        margin-bottom: 35px;
        background:#f1f1f1;

    }

    .textb {
        border-bottom: 2px solid #adadad;
        position: relative;
        margin: 30px 0;
        background: #f1f1f1;

    }

    .textb input {
        font-size: 15px;
        color: #333;
        border: none;
        width: 100%;
        outline: none;
        background: #f1f1f1;
        padding: 0 5px;
        height: 40px;
    }

    .textb span::before {
        content: attr(data-placeholder);
        position: absolute;
        top: 50%;
        left: 5px;
        color: #adadad;
        transform: translateY(-50%);
        z-index: -1;
        translate: .5s;
    }

    .textb span::after {
        content: '';
        position: absolute;
        width: 0%;
        height: 2px;
        /*background: linear-gradient(120deg, #3498db, #1d7028);*/
        background: #f1f1f1;
        transition: .5s;
    }
    
    .textb label{
        background:#f1f1f1;
    }
    
    .custom-select,.position,.position option{
        background:#f1f1f1;
    }

    .focus+span::before {
        top: -5px;
    }

    .focus+span::after {
        width: 100%;
    }

    .scrolldiv {
        width: 300px;
        height: 300px;
        margin-top: 20px;
        background:#f1f1f1;
        overflow: hidden;
        overflow-y: scroll;
    }

    .scrollobj{
        background:#f1f1f1;
    }    

    .sbtn{
            display: block;
            margin-top: 30px;
            width: 100%;
            height: 50px;
            border: none;
            /*background: linear-gradient(120deg,#3498db,#8e44ad,#6c34db);*/
            background: #ffb703;
            background-size: 200%;
            color: #fff;
            outline: none;
            cursor: pointer;
            transition: .5s;
            border-radius:5px;
        }

        .sbtn:hover{
            background-position: right;
        }

        ::-webkit-scrollbar-thumb{
            background: #6c34db;
        }
         ::-webkit-scrollbar-corner{
            border-radius: 30px;
        }

        .l{
            margin-left: 10px;
        }
        
        @media screen and (max-width: 800px) {    
            .details {
                width: 300px;
                background-color: #f1f1f1;
                margin-top:10px;
                height: 500px;
                padding: 60px 40px;
                border-radius: 10px;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }
            
            .details h1{
                text-align: center;
                margin-bottom: 30px;
                background:#f1f1f1;
                font-size:25px;
                
            }
            
            .scrollobj{
                width:300px;
                background:#f1f1f1;
            }
            
            .scrolldiv {
                width: 250px;
                height: 280px;
                margin-top: 20px;
                background:#f1f1f1;
                overflow: hidden;
                overflow-y: scroll;
            }
        }

    
</style>
</head>
<body>
     <div class="header">
        <h2 class="logo">Q-VOTE</h2>
        <input type="checkbox" id="check">
        <label for="check" class="menu-button"> 
            <i class="fa-solid fa-ellipsis"></i> 
        </label>
        
        <ul class="menu">
           <a href="index.php">Home</a>   
            <a href="https://qrvote-19592.000webhostapp.com/opt_verify.php">Vote</a>
            <a href="candidate.php">Candidate Registration</a>
            <a href="cand_info.php">Candidate Info</a>
            <a href="contact.php">Contact</a>
            <a href="admin_login.php">Admin</a>
            <a href="logout.php">Logout</a>

            <label for="check" class="hide-menu-button"> 
                <i class="fa-solid fa-times"></i> 
            </label>
        </ul>     
    </div>
    <form action="https://qrvote-19592.000webhostapp.com/candidate.php" method="post" class="details">
        <h1>ENTER DETAILS</h1>

        <div class="scrolldiv">

            <div class="scrollobj">
                <div class="textb">
                    <input type="text" placeholder="Name" name="name" required>
                </div>

                <div class="textb">
                    <input type="text" placeholder="Department" name="department" required>
                </div>

                <div class="textb">
                    <input type="text" placeholder="Class" name="class" required maxlength="3">
                </div>

                <div class="textb">
                    <input type="text" placeholder="Roll no" name="roll" required maxlength="3">
                </div>

                <div class="textb">
                    <input type="text" placeholder="PID" name="pid" required maxlength="6">
                </div>

                <div class="textb">
                    <div class="custom-select" style="width:200px;">
                      <select class="position" name="position" required>
                        <option value="select">Select Position</option>
                        <option value="President">President</option>
                        <option value="General_Secretary">General Secretary</option>
                        <option value="Cultural_Secretary">Cultural Secretary</option>
                        <option value="Technical_Secretary">Technical Secretary</option>
                        <option value="NSS_Representative">NSS Representative</option>
                        <option value="Reserved_Representative">Reserved Representative</option>
                        <option value="Lady_Representative">Lady Representative</option>
                        <option value="Sports_Secretary">Sports Secretary</option>
                      </select>
                    </div>
                </div>

                <div class="textb">
                    <input type="text" placeholder="Manifesto" name="manifesto" required>
                </div>

                <div class="textb">
                    <input type="text" placeholder="Phone_Number" name="number" required maxlength="10">
                </div>

                <div class="textb">
                    <input type="file" id ="photo" name="photo" >
                    <label class = "l" for="a"> upload photo</label>
                </div>
            </div>

        </div>

        <input type="submit" class ="sbtn" value="SUBMIT">
    </form>

</body>

</html>