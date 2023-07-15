<html>
    <head>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CONTACT PAGE</title>
        <link rel="stylesheet" href="Mainpage.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/309cf469ef.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="Mainpage.css">
        <style>
           
        
            .col-md-6 h2{   /*contact us*/
                background:none;
                width: 100%;
                color: #f2f2f2;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .col-md-6 p{
                background: none;
            }

            .col-md-6 ul.social-icons{
                background: none;
            }

            .row p{
                background:none;
                display:flex;
                justify-content:center;
                align-items:center;
            }


            .col-md-6{        
                background: none;
            }

            .info1{
                padding-top: 10px;
                margin-left: 510px;
                text-align: center;
                font-size: 15px;
                color: #fff;  
                width: 600px;
                background: none;
            }

        .social-icons { /*required*/
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            background: none;
        }

        .social-icons ul{
            background: none;
        }

        .social-icons li { /*required*/
            margin: 0 10px;
            background: none;
        }

        .social-icons a { /*required*/
            color: #333;
            font-size: 24px;
            transition: all 0.3s ease-in-out;
            background: none;
        }

        .social-icons a:hover {
            color: #4267B2;
        }

        .contact-form { /*reqired*/
            background: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            margin-left: 30%;
            margin-right: 30%;
        }

        .contact-form h2 {
            font-size: 24px;
            margin-top: 0;
            margin-bottom: 30px;
            background: #f2f2f2;
        }

        .contact-form label { /*required*/
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            background: #f2f2f2;
            width: 100%;
        }

        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 100%;
            font-size: 16px;
            resize: vertical;
            background: #f2f2f2;
        }

        .contact-form textarea {
            height: 150px;
        }

        
        .contact-form button{
            background: #020202;
            font-size: 16px;
            cursor: pointer;
            border: #020202;
            border-radius:5px;
            color: #f2f2f2;
            padding: 5px;
            width:100px;
        }
        
        #submit_btn{
            width:100%;
            display:flex;
            justify-content:center;
            align-items:center;
            background:none;
        }


        @media screen and (max-width: 767px) {
            .contact-form { /*reqired*/
            background: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            margin-left: 10%;
            margin-right: 10%;
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
    <div class="col-md-6">
        <h2>Contact Us</h2>
        <form class="contact-form">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Message</label>
            <textarea id="message" name="message" required></textarea>
            <div id="submit_btn"><button type="submit">Send</button></div>
        </form>
    </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <p>© 2023 My Website. All Rights Reserved.</p>
        </div>
        <div class="col-md-6">
            <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://instagram.com/dishant_shah31?igshid=ZDdkNTZiNTM="><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
</body>
</html>