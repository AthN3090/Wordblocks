 <?php require "server.php"; ?>
<?php

$q = intval($_GET['q']);
$blogger = $_SESSION['username'];
$index = $q;
$data = new blog();
$query = "SELECT id,title,category,body,date,blogger,likes FROM blogs WHERE blogger <> '$blogger' ORDER BY date DESC";
$result = mysqli_query($db, $query);
$temp = mysqli_fetch_all($result);

$data->id = utf8_encode($temp[$index][0]);
$data->title = utf8_encode($temp[$index][1]);
$data->category = utf8_encode($temp[$index][2]);
$data->body = utf8_encode($temp[$index][3]);
$data->date = utf8_encode($temp[$index][4]);
$data->blogger = utf8_encode($temp[$index][5]);
$data->likes = utf8_encode($temp[$index][6]);

echo(json_encode($data));

?>