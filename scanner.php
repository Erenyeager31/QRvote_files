<?php
session_id('pid123');
session_start();
include 'dbconnect.php';
$conn = OpenCon();
//ini_set('display_errors', 1);
//error_reporting(E_ALL);


$pid = $_SESSION["number_pid"];

//echo $pid;
$flag = 0;
$f=0;

    // submit.php
        if (isset($_POST['pid'])) {
          $position = "";
          $pid_numb = $_POST['pid'];
          $msg =  $pid_numb;
          
          $sql = "SELECT `position` FROM `candidate` WHERE `pid` = '$pid_numb'";
          $result = mysqli_query($conn,$sql);
          if (mysqli_num_rows($result) > 0) {
              //echo "inside";
              while($row = mysqli_fetch_assoc($result)) {
                   
                   $position = $row["position"];
             //echo $position;
                   
                //     if(strtolower($position) === strtolower($row["position"]))
                //     {
                //   //     echo "inside";
                //     $flag = 1;
                //     }
              }
            }
            else
            {
                $flag = 1;
            }
             
          if($flag === 1)
          $msg = "Please scan a proper QR code";
          
          $flag = 0;
          $sql = "SELECT * from user where pid = $pid";
          $result = mysqli_query($conn,$sql);
          if (mysqli_num_rows($result) > 0) {
             while($row = mysqli_fetch_assoc($result)) {
                    if($position === 'President')
            {
                //echo $position;
                $flag = $row['President'];
                //echo $flag;
            }
            else if($position === 'General_Secretary')
            {
                $flag = $row["General_Secretary"];
            }
            else if($position === 'Cultural_Secretary')
            {
                $flag = $row["Cultural_Secretary"];
            }
            else if($position === 'Technical_Secretary')
            {
                $flag = $row["Technical_Secretary"];
                echo $flag;            }
            else if($position === 'Sports_Secretary')
            {
                $flag = $row["Sports_Secretary"];
            }
            else if($position === 'NSS_Representative')
            {
                $flag = $row["NSS_Representative"];
            }
            else if($position === 'Lady_Representative')
            {
                $flag = $row["Lady_Representative"];
            }
            else if($position === 'Reserved_Representative')
            {
                $flag = $row['Reserved_Representative'];
            }
                   //echo $flag;
                   $f = $flag;
                   //echo"hi here";
             }
             }
             if($f == 1)
             {
             $msg = "You have Already Voted for the 
                    Given Position";
             }
             else
             {
                 $sql = "UPDATE `candidate` SET `count`=`count` + 1 WHERE `pid` = '$pid_numb'";
                 $result = mysqli_query($conn,$sql);
                 $sql = "UPDATE `user` SET $position = 1 WHERE `pid` = $pid";
                 $result = mysqli_query($conn,$sql);
                 $msg = "Your vote has been casted
                                Successfully";
             }
        }
?>

<style>
           body {
          margin: 0;
          padding: 0;
          display: flex;
          justify-content: center;
          align-items: center;
          background-color: #ffb703;
        }
        
        p {
          position: relative;
          font-family: sans-serif;
          text-transform: uppercase;
          font-size: 2em;
          letter-spacing: 4px;
          overflow: hidden;
          background: linear-gradient(90deg, #000, #fff, #000);
          background-repeat: no-repeat;
          background-size: 80%;
          animation: animate 6s linear infinite;
          -webkit-background-clip: text;
          -webkit-text-fill-color: rgba(255, 255, 255, 0);
        }
        
        @keyframes animate {
          0% {
            background-position: -500%;
          }
          100% {
            background-position: 500%;
          }
        }

    #button{
        display:flex;
        justify-content:center;
        align-items:center;
        }   

        #submit{
             padding:10px;
             background:#e9edc9;
             border:none;
             border-radius:5px;
      }
      
      @media screen and (max-width:800px) {
            #message{
                font-size:20px;
            }
            
            #button{
                margin-top:20px;
            }
            
            #submit{
                padding:10px;
                font-size:15px;
            }
        }
      
</style>




<hmtl>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>QR VOTE</title>
        <link rel="stylesheet" href="Mainpage.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/309cf469ef.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <!--    <div class="header">-->
    <!--    <h2 class="logo">Q-VOTE</h2>-->
    <!--    <input type="checkbox" id="check">-->
    <!--    <label for="check" class="menu-button"> -->
    <!--        <i class="fa-solid fa-ellipsis"></i> -->
    <!--    </label>-->
        
    <!--    <ul class="menu">-->
    <!--        <a href="index.php">Home</a>   -->
    <!--        <a href="opt_verify.php">Vote</a>-->
    <!--        <a href="candidate.php">Candidate Registration</a>-->
    <!--        <a href="cand_info.php">Candidate Info</a>-->
    <!--        <a href="contact.php">Contact</a>-->
    <!--        <a href="vote_graph.html">Analysis</a>-->
    <!--        <a href="logout.php">Logout</a>-->

    <!--        <label for="check" class="hide-menu-button"> -->
    <!--            <i class="fa-solid fa-times"></i> -->
    <!--        </label>-->
    <!--    </ul>     -->
    <!--</div>-->
        <p id="message"><?php echo $msg;?></p>
        <div id="button"> 
            <button onclick="change()" id="submit">Voting Page</button>
        </div>
    </body>
    
    <script>
        function change()
        {
            window.location.href = "qrvote.php";
        }
    </script>
</hmtl>