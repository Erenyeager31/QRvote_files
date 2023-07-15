<?php
session_id('123');
session_start();

      $auth = 'no';
      $auth = $_SESSION['auth'];
      
      if (isset($_SESSION['auth']) && $_SESSION['auth'] === 'yes') {
        header("Location:https://qrvote-19592.000webhostapp.com/qrvote.php");
        exit();
      }
      else{
            header("Location:https://qrvote-19592.000webhostapp.com/opt_verify.php");   
            exit();
      }
?>   