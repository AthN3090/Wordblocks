<?php
require "server.php";

$index = $_POST["index"];

$query = "DELETE FROM blogs WHERE id = '$index'";
mysqli_query($db,$query);

?>