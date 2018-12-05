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
    <script>
     var wrap=document.createElement('div');
        wrap.className='feedcontainer';
    
var count=-1;    

function display()
{      count++;
    var blog=document.createElement('div');
        blog.className='blog';
    
    
    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
            
                blog.innerHTML = this.responseText;
                wrap.appendChild(blog);
        document.body.appendChild(wrap);
            }
        };
        xmlhttp.open("GET","personalfetch.php?q="+count,true);
        xmlhttp.send();
 
    }
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
            var del=document.getElementsByClassName('del_button');
                
            }
        };
        xmlhttp.open("GET","personalfetch.php?q="+count,true);
        xmlhttp.send();
    
        
    
    </script>
    <title>
    UserName</title>
    </head>
    <body><?php
        
        personal_blog_display();
        ?>
        <!-- loading screen--><div id=loadscreen>
    
         <div class="loading">
        </div>
    </div><!-- loading screen -->
    <div id="topbar"><!-- topbar for search and title -->
        <font id="headerfont">blogsPot</font>
    <img id="search" src="images/search.png">
    </div>
        <div id="profilecontainer">
            <input id="displayname" type="text" name="displayname" value="<?PHP echo $_SESSION['Fname']." ".$_SESSION['Lname']; ?>" readonly>        
            <a href="userblogs.php"><button id="myblogs" name="myblogs"></button></a>
 <button id="notification" name="notification" >
            </button><form method="post" action="userpage.php">
            <input type="submit" value="" id="logout" name="logout"></form>
            
        
</div>
        <div id="pagetag">Your blogs</div>
        
        
    
    
    
    
    
    
    
    
    
    
    
    </body>
</html>