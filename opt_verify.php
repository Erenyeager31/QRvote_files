<!DOCTYPE html>
<html>
  <head>
    <title>Verify Phone Number</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Mainpage.css">

    <style>
        #otp,#verify {
            width: 500px;
            /*background: linear-gradient(120deg,#3498db,#8e44ad,#6c34db);*/
            background: #fff;
            color: #000;
            height: 500px;
            padding: 80px 40px;
            border-radius: 10px;
            position: absolute;
            left: 50%;
            top: 50%;
            position: absolute;
            transform: translate(-50%,-50%);
            z-index: -1;
            background-size: cover;
            background-repeat: no-repeat;
        }

       #verify h1{
        background: none;
        text-align: center;
       }

        #verify{
          display: none;
        }

        input[type=text], /*required*/
        input[type=password] {
            width: 100%;
            padding: 10px 8px;
            margin: 4px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {  /*required*/
          display: flex;
            margin-top: 10px;
            border-radius: 10px;
            width: 100%;
            height: 50px;
            border: none;
            /*padding: auto;*/
            /*background: linear-gradient(120deg,#3498db,#8e44ad,#6c34db);*/
            /*background: linear-gradient(170deg,#000000,#68646a,#d5d3d9);*/
            background:#ffb703;
            background-size: 200%;
            color: #fff;
            outline: none;
            cursor: pointer;
            transition: .5s;
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        #otp h1 {  /*required*/
          text-align: center;
            margin-bottom: 60px;
            margin-top: -30px;
            background: #fff;                                   
        }

        .formcontainer {
            text-align: left;
            /*margin: 24px 50px 12px;*/
            margin-top: 10px;
            margin-left: 30px;
            margin-right: 30px;
            background: #fff;
        } /*required*/

        .container {  /*required*/
            
            text-align: left;
            background: #fff;
        }

    
        #number,#verificationCode{  /*required*/
          border-bottom: 2px solid #adadad;
            position: relative;   
            margin: 50px 0;
            color: #000;
            background: #f1f1f1;
        }

        

        #recaptcha-container{ /*required*/
          width: 50px;
          background: #fff;
        }

        #warning{
            text-align: center;
            margin-top: 20px;
            margin-bottom: -10px;
            color: red;
            display: none;
            background: #fff;
        }

/* Change styles for span on extra small screens */

        @media screen and (max-width: 800px) {    
            /**{*/
            /*  margin: 0;*/
            /*  padding: 0;*/
            /*  font-family: "montserrat",sans-serif;*/
            /*  box-sizing: border-box;*/
              /*background: linear-gradient(120deg,#3498db,#8e44ad,#6c34db);*/
            /*  background-size: cover;*/
      
            /*}      */
           

            form,#otp,#verify{
            width: 300px;
            background: #fff;
            color: #000;
            height: 450px;
            border-radius: 20px;
            position: absolute;
            left: 50%;
            top: 50%;
            position: absolute;
            transform: translate(-50%,-50%);
            z-index: -1;
        }    

        #verify{
          height: 400px;
        }        
      
        h1 { 
          text-align: center;
            font-size: 15px;
            margin-bottom: 30px;
            margin-top: -30px;
            background: #fff;                                   
        }

        #verificationCode{
          margin-top: 80px;
        }

        #verify1{
          margin-top: 80px;
        }

        .formcontainer{
          margin-left: 1%;
          margin-right: 1%;
        }
        

        #recaptcha-container{ 
          width: 50%;
          background: inherit;
          margin-right: 50%;
          transform:scale(0.77);
          transform-origin:0 0;
        }

        #warning{
            text-align: center;
            margin-top: 20px;
            margin-bottom: -10px;
            color: red;
            display: none;
            background: #fff;
            font-size: smaller;
        }
        }
        
        </style>
    
  </head>
  
  <body>
      <?php
         //echo "hi";
         //echo "second hi";
          ini_set('display_errors', 1);
        error_reporting(E_ALL);
        //  if(isset($_POST['function']))
        //  if($_POST['function'] == 'fetch_number')
        //  {
        //      function fetch_number(){
        //      include 'otp_connect.php';
        //      //echo $number;
        //      echo $pid;
        //      //return $number;
        //      }
        //  }
        //  ?>
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
  
    <form id="otp" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <h1>PLEASE ENTER YOUR PID</h1>
      
        <div class="formcontainer">
  
          <div class="container">
        <!--<label id="phone_numb" ,for="uname">Phone Number</label>-->
            <div id="warning">Please Enter 6-digit PID</div>
            <input type="text" id="number" onclick="hideup()" placeholder="Enter PID" name="pid" required>
          </div>
          <div id="recaptcha-container" ></div>
          <button id="send" type="button" onclick="myFunction();">Send Otp</button>
        </div>
    
    </form>

    <form id="verify">
      <h1>ENTER THE OTP</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
      <input type="text" id="verificationCode" placeholder="Enter verification code">
      
      </div>
      
     
      <button id="verify2" type="button" onclick="codeverify();">Verify code</button>
      </div>
    
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
    <script>
    pid = 0;
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
    apiKey: "AIzaSyD3ghheVvFP-bAA3MVb71fXiWD4O91_zf0",
    authDomain: "qrvote-19592.000webhostapp.com",
    //authDomain: "web-qrvote-19592.firebaseapp.com",
    projectId: "web-qrvote-19592",
    storageBucket: "web-qrvote-19592.appspot.com",
    messagingSenderId: "303934489785",
    appId: "1:303934489785:web:86bbf99d2d3318ccf34768",
    measurementId: "G-HNCRK8DFS3"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
     firebase.analytics();

     function hideup(){
        document.getElementById("warning").style.display = "none";
    }

    function myFunction(){
        var x = document.getElementById("number").value;
        pid = x;
        //alert(pid);
        //alert(x);

        if(x.length == 6){
            $.ajax({
            url:"https://qrvote-19592.000webhostapp.com/otp_connect.php",    //the page containing php script
            type: "POST",    //request type,
            //dataType: 'json',
            data: {pid: x},
            success:function(result){
                //alert("yes");
                //alert(x);
                //alert("yaha se chalu");
                number = result;
                //alert(number);
                phoneAuth(number);
            },
            error:function(result){
                alert(result.status);
            }
            });
            
            document.getElementById("otp").style.display = "none";
            document.getElementById("verify").style.display = "block";
            
            
            
            
            
        } 
        else{
            document.getElementById("warning").style.display = "block";
        }
    } 

    window.onload = function() {
    render();
    };

    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }

    var coderesult;
    function phoneAuth(number) {
        //get the number
        //var number = document.getElementById('number').value;
        number = "+91"+number;
        
        // alert(number);
        //it takes two parameter first one is number and second one is recaptcha
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
            //s is in lowercase
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            //alert(coderesult);
            //_coderesult = coderesult;
            console.log(coderesult);
            //alert("Message sent");
            //window.location.href = "verification.html";
        }).catch(function(error) {
            alert(error.message);
        });
    }

    function codeverify(){
        var code = document.getElementById('verificationCode').value;
//        alert(code);
//        alert(coderesult);
        coderesult.confirm(code).then((result) => {
      // User signed in successfully.

      //alert("YES");
      $.ajax({
            url:"https://qrvote-19592.000webhostapp.com/otp_connect.php",    //the page containing php script
            type: "POST",    //request type,
            //dataType: 'json',
            data: {function:'auth'},
            success:function(result){
                //alert("auth started");
                x = result;
                //alert(x);
            },
            error:function(result){
                alert("no auth");
            }
      });
      
      alert(pid);
      //alert("hi");
       $.ajax({
            url:"https://qrvote-19592.000webhostapp.com/pid_fetch.php",    //the page containing php script
            type: "POST",    //request type,
            //dataType: 'json',
            data: {pidnumb:pid},
            success:function(result){
                //alert("Success");
                //alert(result);
            },
            error:function(result){
                alert("fail");
                alert(result);
            }
            });
      
      const user = result.user;
      window.location.href = "redirect_vote.php";
      // ...
    }).catch((error) => {
      // User couldn't sign in (bad verification code?)
      // ...
      alert(error.message);
    });
    }
</script>



    
  </body>
</html>
