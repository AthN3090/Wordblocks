
<?php include('server.php') ?>

<html>

    <head>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    
    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script src="myScript.js"></script>
    
    <!-- TITLE -->    
        <title>
    
        Welcome to BlogsPot !
    
        </title>

    <link rel="stylesheet" type="text/css" href="css/myCss.css"> <!-- linked myCss file -->

    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
   
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    </head>

<body id="body">
<!-- loading screen--><div id=loadscreen>
    
         <div class="loading">
        </div>
    </div><!-- loading screen-->
    <img id="pageicon" src="images/favicon-1024.png">
    
    <div id="topbar"><!-- topbar for search and title -->
        <a href="index.php"><font id="headerfont">blogsPot</font></a>
    <img id="search" src="images/search.png">
    </div>
    
    <div id="greettext">Welcome to BlogsPot!</div>
    
    <div id="loginBox">
        
        <img id="userPIC" src="images/user.png">
        <!-- login form -->
        <form method="post" action="index.php">        
        <input id="username" type="text" placeholder="Username" autofocus autocomplete="off" name="username" required>
            <input id="password" type="password" placeholder="Password" name="password" required>
        <input type="submit" id="submit" value="LogIn" name="LogIn">
            <font style="position: absolute;top: 450px;left: 20px;" color="white" face="nunito">Not a member? <a style="color: aquamarine"  href="sign_up.php">SignUp</a></font> 
        </form><!-- login form ends -->
    </div>
    </body></html>