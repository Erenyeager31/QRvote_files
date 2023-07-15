<?php
        include 'dbconnect.php';
        $conn = OpenCon();
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        $name = '';
        $position = '';
       
        if(!empty($_POST['pid_numb']))
        {
            $pid = $_POST['pid_numb'];
            $sql = "SELECT * from candidate where pid=$pid";
            $result = mysqli_query($conn,$sql);
            
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {

                $name = $row["c_name"];
                $position = $row["position"];
                
            }
            }
            
            $data = array(
                'name' => $name,
                'position' => $position
            );
        }
        else {
                 $data = array(
                    'name' => 0,
                    'position' => 0
                    );
             }
            
            //encode the object as a JSON string
            $json_data = json_encode($data);
            
            echo $json_data;
        
        
          
          
?>
    