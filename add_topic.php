<?php

include 'connect.php';
include 'index.php';

// get data that sent from form 
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_POST['name'];
$email=$_POST['email'];

$datetime=date("d/m/y h:i:s"); //create date time

$sql="INSERT INTO $tbl_name(topic, detail, name, email, datetime)VALUES('$topic', '$detail', '$name', '$email', '$datetime')";
$result=mysqli_query($conn, $sql);

if($result){
echo "Successful<BR>";
echo "<a href=index.php>View your topic</a>";
}
else {
echo "ERROR";
}
mysqli_close();
?>
