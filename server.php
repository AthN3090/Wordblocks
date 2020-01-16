 <?php

    session_start();
    class blog
    {
        public $id;
        public $title;
        public $category;
        public $body;
        public $date;
        public $blogger;
        public $likes;
    }
    class user
    {
        public $id;
        public $Fname;
        public $Lname;
        public $username;
        public $email;
    }
    $db = mysqli_connect('localhost', 'root', '', 'blogspot');
    mysqli_set_charset($db,"utf8");
    ini_set("default_charset", "UTF-8");
    function blog_display($db)
    {

        $query = "SELECT body,date FROM blogs ORDER BY date DESC";
        $result = mysqli_query($db, $query);
        while ($blog = mysqli_fetch_array($result, MYSQLI_NUM)) {


            echo '<script type="text/javascript">',
                'display();',
                '</script>';
        }
    }
    function personal_blog_display($db)
    {
        $blogger = $_SESSION['username'];
        $query = "SELECT category,body,date,blogger FROM blogs WHERE blogger='$blogger' ORDER BY date DESC";
        $result = mysqli_query($db, $query);
        while ($blog = mysqli_fetch_array($result, MYSQLI_NUM)) {


            echo '<script type="text/javascript">',
                'display_indi();',
                '</script>';
        }
    }


    function check($Uname, $Email, $db)
    {
        $user_check_query = "SELECT * FROM users WHERE UserName='$Uname' OR Email='$Email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $temp = mysqli_fetch_assoc($result);

        if ($temp) {
            if ($temp['UserName'] === $Uname) {
                $msg = "Username already exists !";
                echo "<script type='text/javascript'>alert('$msg');</script>";
            }

            if ($temp['Email'] === $Email) {
                $msg1 = "Email already registered !";
                echo "<script type='text/javascript'>alert('$msg1');</script>";
            }
            return 1;
        } else {
            return 0;
        }
    }
    $Fname = $Lname = $Uname = $Pass = $Cpass = $Email = NULL;

    //connecting to my database        


    //getting values from signup form 
    if (isset($_POST['submit'])) {
        $Fname = mysqli_real_escape_string($db, $_POST['Firstname']);
        $Lname =  mysqli_real_escape_string($db, $_POST['Lastname']);
        $Uname =  mysqli_real_escape_string($db, $_POST['Username']);
        $Email =  mysqli_real_escape_string($db, $_POST['Email']);
        $Pass = mysqli_real_escape_string($db, $_POST['Pass']);
        $Cpass =  mysqli_real_escape_string($db, $_POST['Cpass']);


        if (strcmp($Pass, $Cpass) != 0) {                                  //check if passwords match
            $msg = 'Confirm password and password did not match';
            echo "<b><script type='text/javascript'>alert('$msg');</script>";
        } else if (check($Uname, $Email, $db) == 0) {
            //inserting user details
            $password = md5($Pass);
            $query = "INSERT INTO users (FirstName,LastName,UserName,Email,Password) VALUES('$Fname','$Lname','$Uname','$Email','$password')";
            mysqli_query($db, $query);
            $_SESSION['Fname'] = $Fname;
            $_SESSION['Lname'] = $Lname;
            $_SESSION['username'] = $Uname;
            $_SESSION['email'] = $Email;
            $_SESSION['success'] = "You are now logged in";
            header("location: userpage.php");
        }
    }
    //login user 
    if (isset($_POST['LogIn'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password = md5($password);
        $query = "SELECT * FROM users WHERE UserName='$username' AND Password='$password'";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['Fname'] = $user['FirstName'];
            $_SESSION['Lname'] = $user['LastName'];
            $_SESSION['email'] = $user['Email'];
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "you are now logged in";
            header('location: userpage.php');
        } else {
            $msg = "Incorrect Password or Username !";
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
    } //lgoing out user 
    if (isset($_POST['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['Fname']);
        unset($_SESSION['Lname']);
        unset($_SESSION['email']);
        header("location: index.php");
    }

    //submiting editor text
    if (isset($_POST['blog'])) {

        if (isset($_POST['editor'])) {

            $editor_text = mysqli_real_escape_string($db, $_POST['editor']);
            if (!(empty($editor_text))) {
                if (isset($_POST['title'])) {
                    $date = date("Y-m-d");
                    $username = $_SESSION['username'];
                    $title = mysqli_real_escape_string($db, $_POST['title']);
                    $category = mysqli_real_escape_string($db, $_POST['category']);
                    $query = "INSERT INTO blogs (title,category,body,date,blogger) VALUES('$title','$category', '$editor_text','$date','$username')";
                    mysqli_query($db, $query);
                    header('location: userblogs.php');
                }
            }
        }
    }

    if (isset($_POST['submit_changes'])) {
        $current_email = $_SESSION['email'];
        $current_username = $_SESSION['username'];
        $Fname = mysqli_real_escape_string($db, $_POST['Firstname']);

        $Lname =  mysqli_real_escape_string($db, $_POST['Lastname']);
        $Uname =  mysqli_real_escape_string($db, $_POST['Username']);
        $Email =  mysqli_real_escape_string($db, $_POST['Email']);
        

        if ($Uname !== $current_username && $Email !== $current_email) {
            if (check($Uname, $Email, $db) == 0) {
                //inserting user details
                $query = "UPDATE users SET FirstName = '$Fname',LastName = '$Lname', UserName = '$Uname', Email = '$Email' WHERE UserName = '$current_username'";
                mysqli_query($db, $query);
                $_SESSION['Fname'] = $Fname;
                $_SESSION['Lname'] = $Lname;
                $_SESSION['username'] = $Uname;
                $_SESSION['email'] = $Email;
                header("location: userpage.php");
            }
        } else {
            if($Uname != $current_username) {
                
                $query = "SELECT * FROM users WHERE Username = '$Uname'";
                $result = mysqli_query($db, $query);
                $row = mysqli_num_rows($result);

                if($row == 0)
                {    
                $query = "UPDATE users SET FirstName = '$Fname',LastName = '$Lname', UserName = '$Uname' WHERE UserName = '$current_username'";
                mysqli_query($db, $query);
                $_SESSION['Fname'] = $Fname;
                $_SESSION['Lname'] = $Lname;
                $_SESSION['username'] = $Uname;
                header("location: userpage.php");
                }else{
                    $msg = "Username already taken !";
                    echo "<script type='text/javascript'>alert('$msg');</script>";

                }
                    
            } else if ($Email != $current_email) {
                $query = "SELECT * FROM users WHERE Email = '$Email'";
                $result = mysqli_query($db, $query);
                $row = mysqli_num_rows($result);

                if($row == 0)
                {
                $query = "UPDATE users SET FirstName = '$Fname',LastName = '$Lname', Email = '$Email' WHERE UserName = '$current_username'";
                mysqli_query($db, $query);
                $_SESSION['Fname'] = $Fname;
                $_SESSION['Lname'] = $Lname;
                $_SESSION['email'] = $Email;
                header("location: userpage.php");
                }else{
                    $msg = "Email already exist !";
                    echo "<script type='text/javascript'>alert('$msg');</script>";

                }
            }else{
                $query = "UPDATE users SET FirstName = '$Fname',LastName = '$Lname' WHERE UserName = '$current_username'";
                mysqli_query($db, $query);
                $_SESSION['Fname'] = $Fname;
                $_SESSION['Lname'] = $Lname;
                header("location: userpage.php");

            }
        }
    }
    if(isset($_POST["delete_account"])){
        $user = $_SESSION["username"];
        $query = "DELETE FROM users WHERE UserName = '$user'";
        mysqli_query($db,$query);
        $query = "DELETE FROM blogs WHERE blogger = '$user'";
        mysqli_query($db,$query);
        unset($_SESSION['username']);
        unset($_SESSION['Fname']);
        unset($_SESSION['Lname']);
        unset($_SESSION['email']);



    }

    if(isset($_POST["search_button"])){
        echo "<script src='secondary.js'>",
                "</script>";
        $search = mysqli_real_escape_string($db, $_POST["search_field"]);
        $query = "SELECT * FROM blogs WHERE title LIKE '%$search%' OR body LIKE '%$search%' OR category LIKE '%$search%' OR blogger LIKE '%$search%' ORDER BY date DESC";
        $result = mysqli_query($db, $query);
        while ($blog = mysqli_fetch_array($result, MYSQLI_NUM)) {
            

            echo "<script>",
                "display_search_result('$search');",
                "</script>";
        }
            
    
    }


?>