<?php
session_id('admin');
session_start();

      $auth = 'no';
      $auth = $_SESSION['auth'];
//      echo $auth;
      
      if (!isset($_SESSION['auth']))
      {
                header("Location:https://qrvote-19592.000webhostapp.com/admin_login.php");
                exit();      
      }
?>   

<html>
    <head>
        <title>Vote Count</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="Mainpage.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport" content="height=device-height, initial-scale=1.0"> -->
    <script src="https://kit.fontawesome.com/309cf469ef.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    
    <style>
        #grid{
            display:block;
        }
    
        #row1,#row2,#row3,#row4{
            width:100%;
            display:flex;
            
        }
        
        #p,#gs,#ts,#cs,#ss,#lr,#rr,#nr{
            width:50%;
            height:500px;
            padding-left:5%;
            padding-right:5%;
        }
    
    

        @media screen and (max-width:600px) {
                #row1,#row2,#row3,#row4{
                width:100%;
                display:block;
                padding-left:5%;
                padding-right:5%;
            }
            
            #p,#gs,#ts,#cs,#ss,#lr,#rr,#nr{
                width:100%;
                height:200px;
                padding-left:5%;
                padding-right:5%;
                
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

    <!-- Chart section-->
    
    <div id="grid">
        <div id="row1"> 
                <div id="p"><canvas id="President"></canvas></div>
            <div id="gs"><canvas id="General_Secretary"></canvas></div>
        </div>
        
        <div id="row2"> 
            <div id="ts"><canvas id="Technical_Secretary"></canvas></div>
            <div id="cs"><canvas id="Cultural_Secretary"></canvas></div>
        </div>
        
        <div id="row3"> 
            <div id="nr"><canvas id="NSS_Representative"></canvas></div>
            <div id="lr"><canvas id="Lady_Representative"></canvas></div>
        </div>
        
        <div id="row4"> 
            <div id="rr"><canvas id="Reserved_Representative"></canvas></div>
            <div id="ss"><canvas id="Sports_Secretary"></canvas></div>
        </div>
        
    </div>
    
        <script>
        /* snippet to display chart */
         x = [1];
            //using y for defining the names of the candidates
         y = ['a'];
        
            function display_chart(position)
            {
            
            var ctx = document.getElementById(position).getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: y,
                datasets: [{
                label: 'Count Of Votes',
                data: x,
                backgroundColor: '#ffffff66',
                borderColor: '#fb8500',
                borderWidth: 2
                }]
            },
            options: {
                scales: {
                xAxes: [{
                    ticks: {
                    beginAtZero: true
                    },
                    scaleLabel: {
                    display: true,
                    labelString: "Candidates for position of "+position,
                    }
                    // },
                    // labels: {
                    // fontColor: #000000
                    // }
                }]
                }
            }
            });
            }
        
        /*  __________________________  */
        
        
            
            
                    $.ajax({
                    url: "https://qrvote-19592.000webhostapp.com/vote_fetch.php",
                    type: "POST",    //request type,
                    data: {position:"President"},
                    success: function(data) {
                    var result = JSON.parse(data);
                    y= result.p;
                    x = result.p_vote;
                    //alert(y);
                    //alert(x);
                    display_chart("President");
                    },
                    error: function(data){
                        //alert(data.status);
                        alert("no");
                    }
                    });
                    
                     $.ajax({
                    url: "https://qrvote-19592.000webhostapp.com/vote_fetch.php",
                    type: "POST",    //request type,
                    data: {position:"General_Secretary"},
                    success: function(data) {
                    var result = JSON.parse(data);
                    y= result.p;
                    x = result.p_vote;
                    //alert(y);
                    //alert(x);
                    display_chart("General_Secretary");
                    },
                    error: function(data){
                        //alert(data.status);
                        alert("no");
                    }
                    });
                    
                     $.ajax({
                    url: "https://qrvote-19592.000webhostapp.com/vote_fetch.php",
                    type: "POST",    //request type,
                    data: {position:"Technical_Secretary"},
                    success: function(data) {
                    var result = JSON.parse(data);
                    y= result.p;
                    x = result.p_vote;
                    //alert(y);
                    //alert(x);
                    display_chart("Technical_Secretary");
                    },
                    error: function(data){
                        //alert(data.status);
                        alert("no");
                    }
                    });
                    
                     $.ajax({
                    url: "https://qrvote-19592.000webhostapp.com/vote_fetch.php",
                    type: "POST",    //request type,
                    data: {position:"Cultural_Secretary"},
                    success: function(data) {
                    var result = JSON.parse(data);
                    y= result.p;
                    x = result.p_vote;
                    //alert(y);
                    //alert(x);
                    display_chart("Cultural_Secretary");
                    },
                    error: function(data){
                        //alert(data.status);
                        alert("no");
                    }
                    });
                    
                     $.ajax({
                    url: "https://qrvote-19592.000webhostapp.com/vote_fetch.php",
                    type: "POST",    //request type,
                    data: {position:"NSS_Representative"},
                    success: function(data) {
                    var result = JSON.parse(data);
                    y= result.p;
                    x = result.p_vote;
                    //alert(y);
                    //alert(x);
                    display_chart("NSS_Representative");
                    },
                    error: function(data){
                        //alert(data.status);
                        alert("no");
                    }
                    });
                    
                     $.ajax({
                    url: "https://qrvote-19592.000webhostapp.com/vote_fetch.php",
                    type: "POST",    //request type,
                    data: {position:"Lady_Representative"},
                    success: function(data) {
                    var result = JSON.parse(data);
                    y= result.p;
                    x = result.p_vote;
                    //alert(y);
                    //alert(x);
                    display_chart("Lady_Representative");
                    },
                    error: function(data){
                        //alert(data.status);
                        alert("no");
                    }
                    });
                    
                     $.ajax({
                    url: "https://qrvote-19592.000webhostapp.com/vote_fetch.php",
                    type: "POST",    //request type,
                    data: {position:"Reserved_Representative"},
                    success: function(data) {
                    var result = JSON.parse(data);
                    y= result.p;
                    x = result.p_vote;
                    //alert(y);
                    //alert(x);
                    display_chart("Reserved_Representative");
                    },
                    error: function(data){
                        //alert(data.status);
                        alert("no");
                    }
                    });
                    
                     $.ajax({
                    url: "https://qrvote-19592.000webhostapp.com/vote_fetch.php",
                    type: "POST",    //request type,
                    data: {position:"Sports_Secretary"},
                    success: function(data) {
                    var result = JSON.parse(data);
                    y= result.p;
                    x = result.p_vote;
                    //alert(y);
                    //alert(x);
                    display_chart("Sports_Secretary");
                    },
                    error: function(data){
                        //alert(data.status);
                        alert("no");
                    }
                    });
            


            // change_data("President");
            // change_data("General_Secretary");
            // change_data("Technical_Secretary");
            // change_data("Cultural_Secretary");
            // change_data("Sports_Secretary");
            // change_data("Reserved_Representative");
            // change_data("Lady_Representative");
            // change_data("NSS_Representative");
            
            
            </script>
</body>
</html>