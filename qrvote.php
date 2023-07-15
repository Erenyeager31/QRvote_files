<?php
session_id('123');
session_start();

      $auth = 'no';
      $auth = $_SESSION['auth'];
//      echo $auth;
      
      if (!isset($_SESSION['auth']))
      {
                header("Location:https://qrvote-19592.000webhostapp.com/opt_verify.php");
                exit();      
      }
      
    //   if (!isset($_SESSION['auth']) && $_SESSION['auth'] === 'no') {
    //     header("Location:https://qrvote-19592.000webhostapp.com/opt_verify.php");
    //     exit();
    //   }
    //   else{
    //         header("Location:http://qrvote-19592.000webhostapp.com/opt_verify.php");   
    //         exit();
    //   }
?>   

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Voting Page</title>
    <link rel="stylesheet" href="qcss.css">
    
    <style>
        /*Styling for header*/
 
    
    
      body{
        /*background: linear-gradient(270deg,#3498db,#8e44ad,#6c34db);*/
        /*background: linear-gradient(270deg,#000000,#68646a,#d5d3d9);*/
        background:#ffb703;
      }

      #reader{
        width: 400px;
        height: 400px;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        margin-top: 20%;
        background:none;
      }

      #result{
        display: none;
        justify-content: center;
        align-items: center;
        margin-top: 10%;
        color: #f2f2f2;
      }

      p{
          display: flex;
          justify-content: center;
          align-items: center;
          vertical-align: middle;
          text-transform: capitalize;
          font-size: 20px;
          font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
          font-weight: 500;
      }

      #result button{
        background: #fff;
        width: 100px;
        height:50px;
      }
      
      #detail{
              display:block;
              justify-content:center;
              align-items:center;
          }
          
      #test_name,#pos{
          /*display:flex;*/
          /*justify-content: center;*/
          /*align-items: center;*/
          color:#b8c0ff;
          border-color:2px #dad7cd;
          font-size:50px;
          font-weight:800;
          padding-left:5px;
          padding-right:5px;
      }
      
      #button{
          width:100%;
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
      
      #pid_numb{
          display:none;
      }
      
      #incorrect{
          display:none;
      }
      
      #back{
          display:none;
          justify-content:center;
          align-items:center;
          margin-top:30%;
          margin-left:50%;
          margin-right:50%;
      }
      
      #back_1{
          display:none;
          justify-content:center;
          align-items:center;
          margin-top:30%;
          margin-left:45%;
          margin-right:50%;
      }
      
      #back_b{
          display:flex;
          position:absolute;
          padding:5px;
          background:white;
          justify-content:center;
          align-items:center;
          border:none;
          border-radius:5px;
      }
    
    #text{
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
    
    
   

      @media screen and (max-width:800px){
          #detail{
              display:block;
              justify-content:center;
              align-items:center;
          }
          
          #back{
          display:none;
          width:100%;
          margin-top:30%;
          vertical-align:middle;
          margin-left:40%;
          margin-right:40%;
          }
          
          #back_1{
          display:none;
          width:100%;
          margin-top:30%;
          vertical-align:middle;
          margin-left:40%;
          margin-right:40%;
          }
          
          #incorrect{
              display:none;
              margin-top:40%;
          }
          
        #reader{
        width: 300px;
        height: 300px;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        margin-top: 200px;
      }
      
       #result{
        display: none;
      }
      
      #incorrect{
          display:none;
          vertical-align:center;
      }
      
      #text{
          font-size:15px;
      }

      p{
          display: flex;
          justify-content: center;
          align-items: center;
          vertical-align: middle;
          text-transform: capitalize;
          /*margin-left:100%;*/
          /*margin-right:100%;*/
          font-size: 15px;
          font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
      }
      
      #test_name,#pos{
          /*display:flex;*/
          /*justify-content: center;*/
          /*align-items: center;*/
          color:#f1f1f1;
          border-color:5px #dad7cd;
          font-size:25px;
          font-weight:800;
          padding-left:5px;
          padding-right:5px;
          padding-bottom:10px;
      }
      
      #id1{
          padding-bottom:0px;
      }
      
      /*#result.q{*/
      /*    display:flex;*/
      /*    justify-content: center;*/
      /*    align-items: center;*/
      /*    margin-left:500px;*/
      /*}*/
      
      
       form{
        margin-left: 10%;
        margin-right: 10%;
        text-align: center;
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
            

            <label for="check" class="hide-menu-button"> 
                <i class="fa-solid fa-times"></i> 
            </label>
        </ul>     
    </div>
     <script src="html5-qrcode.min.js"></script>
    
    <main>
      <div id="reader"></div>
      <div id="result">
           <form method="post" action="scanner.php">
          <p id="id1">Are you sure you want to vote for</p> <br> 
          <div id="detail">
            <p id="test_name"></p>
            <p id="id2">for the Position Of</p>
            <p id="pos"></p>
          </div>
      <input id="pid_numb" name="pid" readonly></input>
      
      
   <div id="button"> <input id="submit" type="submit"> </div>
        </form>
        <div id="back"><button onclick="reload()" id="back_b">NO,Voting Page</button></div>
      </div>
      <div id="incorrect"><p id="text">Please Scan A Valid QR CODE</p></div>
      <div id="back"><button onclick="reload()" id="back_b">Voting Page</button></div>
    </main>

<!--    Script starts from here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
    pid = 0;
      const scanner = new Html5QrcodeScanner('reader', {
        qrbox: {
          width: 200,
          height: 200,
        },
        fps:20
      })
      scanner.render(success, error)
      
                    
      function success(result) {
        scanner.clear()
        document.getElementById('reader').remove()
        document.getElementById("pid_numb").value = result;
        x = document.getElementById("pid_numb").value;
        // alert("pid"+x);
        pid = result;
        ajax_r(pid);
    
      }
  
  function ajax_r(pid)
  {
      //alert("inside"+pid);
      name = "";
      position = "";
        $.ajax({
                    url: "https://qrvote-19592.000webhostapp.com/cand_info_fetch.php",
                    type: "POST",    //request type,
                    data: {pid_numb:pid},
                    success: function(data) {
                    var result = JSON.parse(data);
                    a = result.name;
                    b = result.position;
                    name = a;
                    position = b;
                    // alert(name);
                    // alert(position);
                    setup(name,position);
                    
                    },
                    error: function(data){
                        //alert(data.status);
                        alert("no");
                    }
                    });
                    
            function setup(name,position)                    
            {
               
               if(name != 0)
               {
            document.getElementById("result").style.display = "block"; 
            document.getElementById("test_name").innerHTML = name;
            document.getElementById("pos").innerHTML = position;
            document.getElementById("pid_numb").innerHTML = pid;
            document.getElementById("back").style.display = "block";
            // document.getElementById('reader').remove()
               }
               else
               {
                   document.getElementById("incorrect").style.display = "block";
                   document.getElementById("back").style.display = "block";
                   
               }
           
            // x = document.getElementById("pid_numb").innerHTML.value;
            // alert(x);
     
      
            /*document.getElementById("ip_name").value = result;*/
  }
  }
      
      function error(err)
      {
          console.log(err);
      }
      
      function reload()
      {
          window.location.reload();
      }
     
    </script>
     
  </body>
</html>
