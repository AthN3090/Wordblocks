<?php include('server.php') ?>
<html>
<head>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/myCss.css"> <!-- linked myCss file -->
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="myScript.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="secondary.js"></script>
    
    <title>
    UserName</title>
    </head>
    <body><?php
         
    blog_display();
        
        ?>
         <div id="textbox" >
            <div id="editor">
                <form method="post" action="userpage.php">
                    <input id="title" type="text" name="title" placeholder="Title" required>
            <textarea id="text" name="text"></textarea>
                    <script>
                    
                    CKEDITOR.replace( 'text' );
                    
                    </script>
                
          <button id="cancel" ></button>
             <input id="submit_text" type="submit" name="blog" value=""></form>
             </div></div>
        <!-- loading screen--><div id=loadscreen>
    
         <div id=loadscreen>
    
    
            <div class="text-center">
  <div class="spinner-grow loading" style="height:90px;width:90px;color:#3bcc72;" role="status">
  </div>
</div>
    
        </div><!-- loading screen -->
    <div id="topbar"><!-- topbar for search and title -->
        <a href="index.php"><font id="headerfont">blogsPot</font></a>
    <img id="search" src="images/search.png">
    </div>
        <div id="profilecontainer">
            <input id="displayname" type="text" name="displayname" value="<?PHP echo $_SESSION['Fname']." ".$_SESSION['Lname']; ?>" readonl>   
            <a href="userblogs.php"><button id="myblogs" name="myblogs"></button></a>
 <button id="notification" name="notification" >
            </button><form method="post" action="userpage.php">
            <input type="submit" value="" id="logout" name="logout"></form>
            
        
</div>
        <div class="pagetag1" style="position:absolute;top:190px;left:140">Your feed</div>
        
            
            <button id="pen" ></button>
        
        <div class="pagetag1" style="position:absolute;top:190px;right:160;">Your Connections</div>
        <div id="connections"></div>
    
    
    
    
    
    
    
    
    
    
    
    
    </body>
</html>