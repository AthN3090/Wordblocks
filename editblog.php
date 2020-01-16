<?php require "server.php";

$q = intval($_GET['q']);
$index = $q;
$data = new blog();
$query = "SELECT id,title,category,body,date,blogger,likes FROM blogs WHERE id = '$index'";
$result = mysqli_query($db, $query);
$temp = mysqli_fetch_all($result);

$data->id = utf8_encode($temp[0][0]);
$data->title = utf8_encode($temp[0][1]);
$data->category = utf8_encode($temp[0][2]);
$data->body = utf8_encode($temp[0][3]);
$data->date = utf8_encode($temp[0][4]);
$data->blogger = utf8_encode($temp[0][5]);
$data->likes = utf8_encode($temp[0][6]);

echo(json_encode($data));


?>
