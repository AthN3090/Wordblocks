<?php include('server.php')?>
<html>
<head><link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <title>
    Sign Up for BlogsPot
    </title>
    <link rel="stylesheet" type="text/css" href="css/myCss.css"> <!-- linked myCss file -->
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="myScript.js"></script>
    </head>
    <body>
       
        
        <!-- loading screen--><div id=loadscreen>
    
         <div class="loading">
        </div>
    </div><!-- loading screen -->
    <div id="topbar"><!-- topbar for search and title -->
       <a href="index.php"><font id="headerfont">blogsPot</font></a>
    <img id="search" src="images/search.png">
    </div>
        <div id="signupbox">
            <div style="text-align: center;font-family:pacifico;font-size:40px;color:white;width: 100%;position: absolute;top: 20px;">Signup for free</div>
            <form method="post" action="sign_up.php">
<div class="userdetails"><input style="text-transform: capitalize;" class="firstinput" type="text" name="Firstname" placeholder="First Name" autocomplete="off" required><!--First name -->
    <input style="text-transform: capitalize;" class="firstinput" type="text" name="Lastname" placeholder="Last Name" autocomplete="off" required><!--Last name --></div>
<div class="userdetails"> <input class="firstinput" type="text" name="Username" placeholder="Choose a Username" autocomplete="off" required><!--Username -->
    <input class="firstinput" type="text" name="Email" placeholder="Email" autocomplete="off" required><!--Email --></div>
<div class="userdetails">  <input class="firstinput" type="password" name="Pass" placeholder="Your Password" autocomplete="off" required><!--Password -->
    <input class="firstinput" type="password" name="Cpass" placeholder="Confirm Password" autocomplete="off" required><!--Confirm password --></div>
            
            
    <input type=submit id="firstsubmit" name="submit" value="Confirm">
            </form>
        
        
        </div>
    
    
    
    
    
    </body>
</html>