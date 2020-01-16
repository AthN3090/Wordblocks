<?php require "server.php";
ini_set("default_charset", "UTF-8");
   header('Content-type: application/json');
   $json = file_get_contents('php://input');
   $json_decode = json_decode($json, true); 
   $index = $json_decode["id"];
   $title = $json_decode["title"];
   $category = $json_decode["category"];
   $editor_text =  mysqli_real_escape_string($db,$json_decode["body"]); 
   mysqli_query($db,"SET NAMES 'utf8'");

   $query = "UPDATE blogs SET title='$title', category='$category',body='$editor_text' WHERE id='$index'";
   
        if(!empty($editor_text)){
            if(mysqli_query($db,$query)){
                echo "SUCCESS";
            }
            
        }

?>