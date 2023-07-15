<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include "dbconnect.php";
$conn = OpenCon();
?>
<html>
  <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Candidate Information</title>
        <link rel="stylesheet" href="Mainpage.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/309cf469ef.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        

    <style>
      * {
        margin: 0;
        padding: 0;
        text-decoration: none;
        font-family: montserrat;
        box-sizing: border-box;
      }

      body {
        min-height: 100vh;
        /*background-image: linear-gradient(120deg, #3498db, #8e44ad);*/
        
      }
      
      .candidate_info{
          width:100%;
          height:80vh;
          display:flex;
          justify-content:center;
          overflow-y:scroll;
          /*background-color:black;*/
      }
      
      #list_element1,#list_element2{
          width:50%;
          height:fit-content;
          /*display:flex;*/
          justify-content:center;
          align-items:center;
          background-color:white;
          padding:10px 10px;
          text-align:center;
          /*margin:10px 0px;*/
      }
      
      #list_element1 p,#list_element2 p{
          background-color:white;
          /*margin:10px 0px;*/
      }
      
      @media screen and (max-width:800px) {
          .candidate_info{
                width:100%;
                height:fit-content;
                display:flex;
                justify-content:center;
                align-items:center;
                flex-direction:column;
          }
      
      #list_element1,#list_element2{
          width:80%;
          height:fit-content;
          /*background-color:white;*/
          /*text-align:center;*/
          /*margin:0px auto;*/
          /*margin-left:50%;*/
      }
      
      #list_element1 p,#list_element2 p{
          background-color:white;
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
            <a href="https://qrvote-19592.000webhostapp.com/admin_login.php">Admin</a>
            <a href="logout.php">Logout</a>

            <label for="check" class="hide-menu-button"> 
                <i class="fa-solid fa-times"></i> 
            </label>
        </ul>     
    </div>
        <div class="candidate_info" id="candidate_list">
            <div id="list_element1">
            </div>
            <div id="list_element2">
            </div>
        </div>
  </body>
</html>
<script>
    // console.log("hi above")
      $.ajax({
                    url: "fetch_all_cand.php",
                    type: "POST",    //request type,
                    success: function(data) {
                        const cand_data = JSON.parse(data);
                        // console.log(cand_data[0][0])
                        display(cand_data);
                    },
                    error: function(data){
                        // alert(data);
                    }
                    });
                    
    function display(data){
        length = data.length
        
        for(i=0;i<length;i++){
            let id = "";
            if(i%2 == 1)
            id = "list_element2"
            else
            id = "list_element1"
            
            
            document.getElementById(id).innerHTML += '<p>NAME : ' + data[i][0]+ '</p>' + '<br>'
            + '<p>POSITION : ' + data[i][1]+ '</p>' + '<br>'  
            + '<p>PID : ' + data[i][2]+ '</p>' + '<br>'
            + '<p>NUMBER : ' + data[i][3]+ '</p>' + '<br>'
            + '<p>ROLL : ' + data[i][4]+ '</p>' + '<br>'
            + '<p>MANIFESTO : ' + data[i][5]+ '</p>' + '<br>'
            + '<p>DEPARTMENT :' + data[i][6]+ '</p>' + '<br>'
            + '<p>CLASS :' + data[i][7]+ '</p>' + '<br>' + '<hr>';
            document.getElementById(id).style.backgroundColor = "white"
            document.getElementById(id).style.margin = "10px 10px"
            document.getElementById(id).style.border = "2px solid black"
            
            // document.getElementById('list_element2').innerHTML += '<p>NAME : ' + data[i][0]+ '</p>' + '<br>'
            // + '<p>POSITION : ' + data[i][1]+ '</p>' + '<br>'  
            // + '<p>PID : ' + data[i][2]+ '</p>' + '<br>'
            // + '<p>NUMBER : ' + data[i][3]+ '</p>' + '<br>'
            // + '<p>ROLL : ' + data[i][4]+ '</p>' + '<br>'
            // + '<p>MANIFESTO : ' + data[i][5]+ '</p>' + '<br>'
            // + '<p>DEPARTMENT :' + data[i][6]+ '</p>' + '<br>'
            // + '<p>CLASS :' + data[i][7]+ '</p>' + '<br>' + '<hr>';
            // document.getElementById('list_element2').style.backgroundColor = "white"
            
        }
        
    }
  </script>