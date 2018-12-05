<?php require "server.php"; ?>
<?php

$q = intval($_GET['q']);
   
$index=$q;
$blogger=$_SESSION['username'];
$db=mysqli_connect('localhost','root','','blogspot');
$query="SELECT category,body,date,blogger FROM blogs WHERE blogger='$blogger' ORDER BY date DESC";
        $result=mysqli_query($db,$query);
$blog_data=array();
while($row=mysqli_fetch_assoc($result)){
   $blog_data[]=$row;
    
}
  
foreach($blog_data[$index] as $val)
        echo '<br>'.$val . '<br>';
    
?>