<?php

$host="sql12.freesqldatabase.com"; // Host name 
$username="sql12218697"; // Mysql username 
$password="uJEXQMxpDw"; // Mysql password 
$db_name="sql12218697"; // Database name 
$tbl_name="forum_question"; // Table name 
// Connect to server and select databse.
$conn = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db( $conn, $db_name)or die("cannot select DB");
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
mysqli_close($conn);
?>
