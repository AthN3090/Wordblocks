
<?php include('server.php');
if(isset($_SESSION['username'])){
    header("location:userpage.php");
}

?>

<html>

    <head>
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    
    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        
    <link rel="stylesheet" type="text/css" href="css/myCss.css"> <!-- linked myCss file -->

    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
   
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    <script src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
    
    
    
    <!-- TITLE -->    
        <title>
    
        Welcome to WordBlocks !
    
        </title>
    </head>


    <body class="homeBody">
<!-- loading screen-->

    <div id=loadscreen>
    
    
            <div class="text-center">
  <div class="spinner-grow loading" style="height:90px;width:90px;color:#3bcc72;" role="status">
  </div>
</div>
    
        </div>
    <!-- loading screen ends-->
    <div id="navbar"><!-- topbar for search and title -->
        <a href="index.php"><font id="headerfont">WordBlocks</font></a>
    </div>

    <!-- bootstrap cointainer -->
        <div class="cointainer-fluid" style="position:relative;top:50pt;;">
            <div class="row no-gutters">
        <div class="col-sm mr-auto"> 
            <img id="pageicon" src="images/wB-logo.png">
    <div id="greettext">Welcome to WordBlocks!</div>
    </div>
    <!--login box -->
    <div class="col-sm mr-auto">
        <div id="loginBox" >
        
                <img id="userPic" class="img-fluid" src="images/user.png">
        <!-- login form -->
        
                <form method="post" action="index.php">        
        
                    <input id="username"  type="text" placeholder="Username" autofocus autocomplete="off" name="username" required>
           
                    <input id="password"  type="password" placeholder="Password" name="password" required>
        
                    <input type="submit" id="submit" value="LogIn" name="LogIn">
            
                    <center><font style="position:relative;top:140pt;" color="white" face="nunito">Not a member? <a style="color: aquamarine"  href="sign_up.php">SignUp</a></font></center> 
        
                </form><!-- login form ends -->
    
        </div>
      
                <!-- login box -->
    </div>
            </div>
            </div>
   
        <!-- bootsrtap cointainer ends -->

    
     <script src="myScript.js"></script>
        
        </body>
        
    
</html>