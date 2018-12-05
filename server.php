 <?php 
        session_start();
 
function blog_display(){  
      $db=mysqli_connect('localhost','root','','blogspot');
$query="SELECT body,date FROM blogs ORDER BY date DESC";
        $result=mysqli_query($db,$query);
   while($blog=mysqli_fetch_array($result,MYSQLI_NUM)){
       
            
       echo '<script type="text/javascript">',
     'display();',
     '</script>';
         }
  }
function personal_blog_display(){  
      $db=mysqli_connect('localhost','root','','blogspot');
$blogger=$_SESSION['username'];
    $query="SELECT category,body,date,blogger FROM blogs WHERE blogger='$blogger' ORDER BY date DESC";
        $result=mysqli_query($db,$query);
   while($blog=mysqli_fetch_array($result,MYSQLI_NUM)){
       
            
       echo '<script type="text/javascript">',
     'display();',
     '</script>';
         }
  }


function check($Uname,$Email,$db){
    $user_check_query="SELECT * FROM users WHERE UserName='$Uname' OR Email='$Email' LIMIT 1";
    $result=mysqli_query($db,$user_check_query);
    $temp=mysqli_fetch_assoc($result);
    
    if($temp){
        if($temp['UserName']===$Uname){
            $msg="Username already exists !";
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        
        if($temp['Email']===$Email){
            $msg1="Email already registered !";
            echo "<script type='text/javascript'>alert('$msg1');</script>";
        }
     return 1;
    }else
    {
        return 0;
    }
    
    
    
}
  $Fname=$Lname=$Uname=$Pass=$Cpass=$Email=NULL;    
        
//connecting to my database        
        $db=mysqli_connect('localhost','root','','blogspot');
        
//getting values from signup form 
        if(isset($_POST['submit'])){
        $Fname = mysqli_real_escape_string($db,$_POST['Firstname']);
        $Lname =  mysqli_real_escape_string($db,$_POST['Lastname']);
        $Uname =  mysqli_real_escape_string($db,$_POST['Username']);
        $Email =  mysqli_real_escape_string($db,$_POST['Email']);
        $Pass = mysqli_real_escape_string($db,$_POST['Pass']);
        $Cpass =  mysqli_real_escape_string($db,$_POST['Cpass']);
        
        
        if(strcmp($Pass,$Cpass)!=0){                                  //check if passwords match
                $msg='Confirm password and password did not match';
            echo "<b><script type='text/javascript'>alert('$msg');</script>";
            }else if(check($Uname,$Email,$db)==0){
//inserting user details
        $password=md5($Pass);
         $query="INSERT INTO users (FirstName,LastName,UserName,Email,Password) VALUES('$Fname','$Lname','$Uname','$Email','$password')";
                mysqli_query($db,$query);
            $_SESSION['Fname']=$Fname;
        $_SESSION['Lname']=$Lname;  
    $_SESSION['username'] =$Uname;
  	$_SESSION['success'] = "You are now logged in";
    header("location: userpage.php");
    
    }
        
        }
//login user 
if(isset($_POST['LogIn'])){
        $username=mysqli_real_escape_string($db,$_POST['username']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
        $password=md5($password);
        $query="SELECT * FROM users WHERE UserName='$username' AND Password='$password'";
        $result=mysqli_query($db,$query);
        
    if(mysqli_num_rows($result)==1){
        $user=mysqli_fetch_assoc($result);
        $_SESSION['Fname']=$user['FirstName'];
        $_SESSION['Lname']=$user['LastName']; 
            $_SESSION['username']=$username;
            $_SESSION['success']="you are now logged in";
            header('location: userpage.php');
            
        }else{
            $msg="Incorrect Password or Username !";
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
        
    }//lgoing out user 
    if(isset($_POST['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
        unset($_SESSION['Fname']);
        unset($_SESSION['Lname']);
  	header("location: index.php");
  }
    
//submiting editor text
if(isset($_POST['blog'])){
    if(isset($_POST['text'])){    
    $editor_text= $_POST['text'];
        if(!(empty($editor_text))){
            if(isset($_POST['title'])){  
               $date=date("Y-m-d");
            $username=$_SESSION['username'];
                $title=$_POST['title'];
            $query="INSERT INTO blogs (category,body,date,blogger) VALUES('$title','$editor_text','$date','$username')";
            mysqli_query($db,$query);
                header('location: userblogs.php');
        }
        
        
    }
    
    
}

    
}




        
        
        ?>