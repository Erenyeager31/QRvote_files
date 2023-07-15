<?php
        include 'dbconnect.php';
        $conn = OpenCon();
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        // if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sql = "SELECT * from candidate GROUP BY position";
            $result = mysqli_query($conn,$sql);
            // echo $result;
            $i = 0;
            
            
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $candidate[$i][0] = $row['c_name']; 
                $candidate[$i][1] = $row['position'];
                $candidate[$i][2] = $row['pid'];
                $candidate[$i][3] = $row['number'];
                $candidate[$i][4] = $row['roll'];
                $candidate[$i][5] = $row['manifesto'];
                $candidate[$i][6] = $row['department'];
                $candidate[$i][7] = $row['class'];
                $i++;
                // echo "hi";
            }
            }
            
            
            //encode the object as a JSON string
              $json_cand = json_encode($candidate);
            // $json_name = json_encode($name);
            // $json_position = json_encode($position);
            // $json_pid = json_encode($pid);
            // $json_number = json_encode($number);
            // $json_roll = json_encode($roll);
            // $json_manifesto = json_encode($manifesto);
            // $json_department = json_encode($department);
            // $json_class = json_encode($class);
            
            // echo $json_name,$json_position,$json_pid,$json_number,$json_roll,$json_manifesto,$json_department,$json_class;
            echo $json_cand;
?>
    