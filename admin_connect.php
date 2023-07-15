<?php
session_start();
session_id('admin');

        //ini_set('display_errors', 1);
        //error_reporting(E_ALL);

        include 'dbconnect.php';
        $conn = OpenCon();
       
        $pid = $_POST['pid'];
    
        $_SESSION['pid'] = $pid;
        //var_dump();
        
        $number = 0;
        
        if(!empty($_POST['pid']))
        {
            $sql = "SELECT number from admin where pid=$pid";
            $result = mysqli_query($conn,$sql);
            
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                //echo "id: " . $row["number"];
                $number = $row["number"];
                echo $number;
                
            }
            } else {
            echo "0 results";
                    }
            }
            
          function auth(){
                //session_start();
                
                $_SESSION['auth'] = 'yes';
                
                echo "hi";
                
             }
          
           if(isset($_POST['function']))
         if($_POST['function'] == 'auth')
         {
             auth();
             
         }
?>
    