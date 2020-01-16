<?php include('server.php');

if(isset($_SESSION['username']))
{
    $data = new user();
    $user = $_SESSION['username'];
    $query = "SELECT FirstName, LastName, UserName, Email FROM users where Username = '$user'";
    $result = mysqli_query($db,$query);
    $temp = mysqli_fetch_all($result);
    $data->Fname = $temp[0][0];
    $data->Lname = $temp[0][1];
    $data->username = $temp[0][2];
    $data->email = $temp[0][3];

}
else{
    header("location:index.php");
  }
  
?>
<html>

<head>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <title>
        Your profile
    </title>
    <link rel="stylesheet" type="text/css" href="css/myCss.css"> <!-- linked myCss file -->
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="myScript.js"></script>
</head>

<body class="homeBody">


    <!-- loading screen-->

    <div id="loadscreen">


        <div class="text-center">
            <div class="spinner-grow loading" style="height:90px;width:90px;color:#3bcc72;" role="status">
            </div>
        </div>

    </div>


    <!-- loading screen ends-->
    <div id="topbar">
        <!-- topbar for search and title -->
        <a href="index.php" id="headerfont">
            WordBlocks
        </a>
    </div>
    <div id="signupbox">
        <div style="text-align: center;font-family:pacifico;font-size:40px;color:white;width: 100%;position: absolute;top: 20px;">Change profile details</div>
        <form  method="post" action="userdetails.php">
            <div class="userdetails">
            <input style="text-transform: capitalize;" class="firstinput" type="text" name="Firstname" placeholder="First Name" autocomplete="off" required value="<?php echo $data->Fname; ?>">
                <!--First name -->
                <input style="text-transform: capitalize;" class="firstinput" type="text" name="Lastname" placeholder="Last Name" autocomplete="off" required value="<?php echo $data->Lname; ?>">
                <!--Last name -->
            </div>
            <div class="userdetails"> <input class="firstinput" type="text" name="Username" placeholder="New username" autocomplete="off" required value="<?php echo $data->username; ?>">
                <!--Username -->
                <input class="firstinput" type="text" name="Email" placeholder="New email" autocomplete="off" required value="<?php echo $data->email; ?>">
                <!--Email -->
            </div>
             <div class="userdetails">
                 <center><input type="submit" style="top:0;" id="firstsubmit" name="submit_changes" value="Confirm"></center>
                </div>
            <div class="userdetails" style="top:220px;">
            
            <center><input type="submit" id="delete" onclick="delete_account(<?php $_SESSION['username']?>)" name="delete_account" value="Delete account"></center>

        </div>
            

            
        </form>


    </div>





</body>

</html>