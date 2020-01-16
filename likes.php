<?php require 'server.php';

$likes = $_POST["likes"];
$id = $_POST["id"];

$query = "UPDATE blogs SET likes = '$likes' WHERE id = '$id'";
if(mysqli_query($db, $query)){
    echo $likes;
}




